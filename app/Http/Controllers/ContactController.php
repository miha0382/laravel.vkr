<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Customer;
use App\Models\Contact;
use App\Models\Transaction;
use App\Models\User;

class ContactController extends Controller
{
    public function getContact($id)
    {
        $customer = Customer::find($id);
        $contact = Contact::where('customerCode', $id)->get();

        $transactions = Transaction::where('customerCode', $id)->get();

        $data = [];
        foreach($transactions as $key => $transaction)
        {
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

        return view('contact', compact('customer', 'contact', 'data'));
    }

    public function addContact($id, ContactRequest $req)
    {
        $contact = new Contact();
        $contact->customerCode = $id;
        $contact->fio = $req->input('fioInput');
        $contact->phoneNumber = $req->input('phoneNumberInput');
        $contact->email = $req->input('emailInput');

        $contact->save();

        return redirect()
        ->route('get-contact', $id)
        ->with('success', 'Контактная информация была добавлена!');
    }

    public function updateContact($id, ContactRequest $req)
    {
        $contact = Contact::where('customerCode', $id)->first();
        $contact->fio = $req->input('fioInput');
        $contact->phoneNumber = $req->input('phoneNumberInput');
        $contact->email = $req->input('emailInput');

        $contact->save();

        return redirect()
        ->route('get-contact', $id)
        ->with('success', 'Контактная информация была изменена!');
    }

    public function deleteContact($id)
    {
        $contact = Contact::where('customerCode', $id)->first()->delete();
        return redirect()
        ->route('get-contact', $id)
        ->with('success', 'Контактная информация была удалена!');
    }
}
