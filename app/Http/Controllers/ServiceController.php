<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\ServiceRequest;

class ServiceController extends Controller
{
    public function addService(ServiceRequest $request)
    {
        $service = new Service();

        $service->name = $request->input('name');
        $service->price = $request->input('price');
        $service->userCode = $request->user()->id;

        $service->save();

        return redirect()
        ->route('services')
        ->with('success', 'Услуга добавлена!');
    }

    public function deleteService($id)
    {
        Service::find($id)->delete();
        return redirect()
        ->route('services')
        ->with('success', 'Услуга удалена!');
    }

    public function updateService($id, ServiceRequest $request)
    {
        $service = Service::find($id);

        $service->name = $request->input('name');
        $service->price = $request->input('price');

        $service->save();

        return redirect()
        ->route('services')
        ->with('success', 'Услуга изменена!');
    }

    public function getServices()
    {
        $services = Service::all();
        
        echo $services;
    }
}
