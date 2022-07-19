<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Service;
use App\Models\Option;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //$customers = Customer::all(); 
        $customers = Customer::orderBy('id')->paginate(10);
        $services = Service::all();
        $options = Option::all()->sortByDesc('id')->first();
        return view('home')
                    ->with(compact('customers'))
                    ->with(compact('services'))
                    ->with(compact('options'));
    }

    public function customers()
    {
        //$customers = Customer::all(); 
        $customers = Customer::orderBy('id')->paginate(10);
        return view('customers-page', compact('customers'));
    }

    public function services()
    {
        $services = Service::all();
        return view('services-page', compact('services'));
    }

    public function options()
    {
        $options = Option::all()->sortByDesc('id')->first();
        return view('options-page', compact('options'));
    }

}
