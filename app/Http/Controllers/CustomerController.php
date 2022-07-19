<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;

use App\Models\Customer;
use App\Models\Contact;

class CustomerController extends Controller
{
    public function updateCustomer($id, CustomerRequest $request)
    {
        $customer = Customer::find($id);

        $customer->plateNumber = $request->input('plateNumber');

        $customer->save();

        return redirect()
        ->route('customers')
        ->with('success', 'Запись изменена!');
    }

    public function deleteCustomer($id)
    {
        Customer::find($id)->delete();
        return redirect()
        ->route('customers')
        ->with('success', 'Запись удалена!');
    }

    public function search (Request $req)
    {
        $number = $req->number;
        $customers = Customer::query()->where('plateNumber', 'LIKE', "%{$number}%")->orderBy('id')->paginate(10);
        return view('customers-page', compact('customers'));
    }

    public function sortByAsc($col)
    {
        $customers = Customer::orderBy($col)->paginate(10);
        return view('customers-page', compact('customers'));
    }

    public function sortByDesc($col)
    {
        //$customers = Customer::all()->sortByDesc($col)->paginate(10);
        $customers = Customer::orderByDesc($col)->paginate(10);
        return view('customers-page', compact('customers'));
    }
}
