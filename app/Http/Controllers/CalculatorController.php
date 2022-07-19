<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Option;
use App\Models\Customer;

class CalculatorController extends Controller
{
    public function calculate(Request $req)
    {
        $sum = 0;

        $inputs = $req->all();
        unset($inputs['_token']);

        $plateNumber = $inputs['plateNumber'];
        unset($inputs['plateNumber']);
        $customer = Customer::where('plateNumber', $plateNumber)->get();
        if(count($customer) == 0)
        {
            $res = array('error'=>'Данный номер отсутствует в базе!');
            echo json_encode($res);
            return;
        }
        
        foreach($inputs as $input)
        {
            $price = Service::find($input)->price;
            $sum += $price;
        }
        $finalPrice = CalculatorController::checkOptions($sum, $customer);
        $discount = $sum - $finalPrice;

        $formatSum = number_format($sum, 2, '.', ' ');
        $formatFinalPrice = number_format($finalPrice, 2, '.', ' ');
        $formatDiscount = number_format($discount, 2, '.', ' ');
        $res = array('sum' => $formatSum, 'finalPrice' => $formatFinalPrice, 'discount' => $formatDiscount);
        
        echo json_encode($res);
    }

    private function checkOptions($sum, $customer)
    {
        $options = Option::all()->sortByDesc('id')->first();

        if($options->isActiveMax) $maxDiscount = $options->maxDiscount;
        if($options->isActiveCur) $curDiscount = $options->curDiscount;
        if($options->isActiveSpec) $specDiscount = $options->specDiscount;
        if($options->isActiveFree) $freeService = $options->freeService;

        if(isset($freeService))
        {
            $visitCount = $customer[0]->visitCount;
            if($visitCount % $freeService == 0)
            {
                $sum = 0;
                return $sum;
            }
        }

        $discount = 0;
        if(isset($specDiscount))
        {
            $visitCount = $customer[0]->visitCount;
            $discount = $visitCount * $specDiscount;

            if(isset($curDiscount))
            {
                $discount = $curDiscount > $discount ? $curDiscount : $discount;
            }
            if(isset($maxDiscount))
            {
                $discount = $maxDiscount > $discount ? $discount : $maxDiscount;
            }

            $sum -= $sum / 100 * $discount;
            return $sum;
        }

        if(isset($curDiscount))
        {

            //$discount = $curDiscount;???
            if(isset($maxDiscount))
            {
                $discount = $maxDiscount > $curDiscount ? $curDiscount : $maxDiscount;
            }
             $sum -= $sum / 100 * $discount;
             return $sum;
        }
    }

    // private function checkNumber($plateNumber)
    // {
    //     $number = Customer::find($plateNumber);
    //     if(!isset($number))
    //         return false;
    // }

}
