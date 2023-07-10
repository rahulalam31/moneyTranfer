<?php

namespace App\Http\Controllers;

use App\Models\ConversionRate;
use App\Models\CustomisedRate;
use App\Models\ReceivingCountry;
use App\Models\SendingCountry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $sendcontry = SendingCountry::all();
        $reccontry = ReceivingCountry::all();
        return view('welcome', compact('sendcontry', 'reccontry'));
    }


public function data(Request $request)
{
    // dd($request);
    $activeSendingCountries = SendingCountry::getActiveCountries();
    $activeReceivingCountries = ReceivingCountry::getActiveCountries();



    $sendingCountryId = $request->sending_country;
    $receivingCountryId = $request->receiving_country;

    $staticRate = ConversionRate::getStaticRate($sendingCountryId, $receivingCountryId);
    $customisedRate = CustomisedRate::getCustomisedRate($sendingCountryId, $receivingCountryId);
    $conversionRate = $staticRate + $customisedRate;

    return response()->json([
        'staticRate'=> $staticRate,
        'customisedRate' => $customisedRate,
        'conversionRate' => $conversionRate,
    ]);
}
}
