<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\User;

class TransactionController extends Controller
{
    public function getTransactions()
    {
        $transactions = Transaction::all();

        $data = [];
        $index = 0;
        foreach($transactions as $key => $transaction)
        {
            $index++;
            $arr = [];
            $customerCode = $transaction->customerCode;
            $workerCode = $transaction->userCode;

            $plateNumber = Customer::find($customerCode)->plateNumber;
            $customerName = Contact::where('customerCode', $customerCode)->first();
            if(isset($customerName))
                $customerName = $customerName->fio;
            else
                $customerName = 'Информация отсутствует';
            $worker = User::find($workerCode)->name;
            $sum = $transaction->sum;
            $discount = $transaction->discount;
            $finalSum = $transaction->finalSum;
            $date = $transaction->created_at;
            $id = $transaction->id;

            $arr['customerName'] = $customerName;
            $arr['plateNumber'] = $plateNumber;
            $arr['worker'] = $worker;
            $arr['sum'] = $sum;
            $arr['discount'] = $discount;
            $arr['finalSum'] = $finalSum;
            $arr['date'] = $date;
            $arr['id'] = $id;

            $data[$key] = $arr;  

        }
        
        return view('transactions-page', compact('data'));
    }

    public function saveTransaction(Request $req)
    {
        $data = $req->all();

        unset($data['_token']);

        $plateNumber = $data['plateNumber'];
        unset($data['plateNumber']);
        if(!isset($plateNumber)) return 'Error';

        $finalPrice = $data['finalPrice'];
        unset($data['finalPrice']);

        $price = $data['price'];
        unset($data['price']);

        $discount = $data['discount'];
        unset($data['discount']);

        if($finalPrice == $price && $finalPrice == $discount) return 'Error';

        foreach($data as $item)
        {
            if($item == 0)
            {
                return 'Error';
            }
        }

        $transaction = new Transaction();

        $transaction->customerCode = Customer::where('plateNumber', $plateNumber)->first()->id;
        $transaction->userCode = $req->user()->id;
        $transaction->sum = explode(' ', $price, 2)[0];
        $transaction->discount = explode(' ', $discount, 2)[0];
        $transaction->finalSum = explode(' ', $finalPrice, 2)[0];

        $transaction->save();

        return 'Success';
        
    }
}
