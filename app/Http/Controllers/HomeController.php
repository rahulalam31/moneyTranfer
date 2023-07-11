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
    $sendingCountryId = $request->input('sending_country');
    $receivingCountryId = $request->input('receiving_country');

    $staticRate = 0;
    $customisedRate = 0;

    // Check if the selected sending and receiving country IDs exist
    if ($sendingCountryId && $receivingCountryId) {
        $staticRate = ConversionRate::getStaticRate($sendingCountryId, $receivingCountryId);
        $customisedRate = CustomisedRate::getCustomisedRate($sendingCountryId, $receivingCountryId);
    }

    $conversionRate = $staticRate + $customisedRate;

    return response()->json([
        'staticRate' => $staticRate,
        'customisedRate' => $customisedRate,
        'conversionRate' => $conversionRate,
    ]);
}
}
