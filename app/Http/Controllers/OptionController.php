<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Option;

class OptionController extends Controller
{
    public function saveOptions(Request $req)
    {
        if(count(Option::all()) < 2)
        {
            OptionController::createData($req);
        }
        else
        {
            Option::all()->first()->delete();
            OptionController::createData($req);
        }

        return redirect()
        ->route('options')
        ->with('success', 'Настройки сохранены!');
    }

    private function createData($req)
    {
        $option = new Option();

        $option->isActiveMax = $req->input('switchMax') == 'on' ?  true : false;
        $option->maxDiscount = $req->input('maxDiscount');

        $option->isActiveCur = $req->input('switchCur') == 'on' ?  true : false;
        $option->curDiscount = $req->input('curDiscount');

        $option->isActiveSpec = $req->input('switchSpec') == 'on' ?  true : false;
        $option->specDiscount = $req->input('specialDiscount');

        $option->isActiveFree = $req->input('switchFree') == 'on' ?  true : false;
        $option->freeService = $req->input('freeService');
        $option->userCode = $req->user()->id;
        $option->save();
    }

    public function backupOptions ()
    {
        $options = Option::all();

        if(count($options) > 1)
        {
            $options->sortByDesc('id')->first()->delete(); 
        }
        return redirect()
        ->route('options')
        ->with('success', 'Переход к предыдущим настройкам успешно произведен!');;
    }

}
