<?php

namespace App\Http\Controllers;

use App\Models\ConversionRate;
use App\Models\CustomisedRate;
use App\Models\ReceivingCountry;
use App\Models\SendingCountry;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function activateSendingCountry($countryId)
    {
        // dd($request);
        $country = SendingCountry::findOrFail($countryId);
        $country->is_active = 1;
        $country->update();

        return redirect()->back()->with('success', 'Country activated successfully.');
    }

    public function deactivateSendingCountry($countryId)
    {
        $country = SendingCountry::find($countryId);
        $country->is_active = 0;
        $country->save();

        return redirect()->back()->with('success', 'Country deactivated successfully.');
    }


    public function activateRecievingCountry($countryId)
    {
        $country = ReceivingCountry::find($countryId);
        $country->is_active = 1;
        $country->save();

        return redirect()->back()->with('success', 'Country activated successfully.');
    }

    public function deactivateRecievingCountry($countryId)
    {
        $country = ReceivingCountry::find($countryId);
        $country->is_active = 0;
        $country->save();

        return redirect()->back()->with('success', 'Country deactivated successfully.');
    }

    public function getsendingcountry()
    {
        $allsendingcountry = SendingCountry::all();
        return view('sendcountry.index', compact('allsendingcountry'));
    }


    public function getsendingcountrycreate()
    {
        return view('sendcountry.create');
    }

    public function getsendingcountrydelete($countryId)
    {

        $country = SendingCountry::findOrFail($countryId);
        $country->delete();
        return redirect()->back()->with('success', 'Country deleted successfully.');
    }

    public function getsendingcountrysave(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => 'required|max:50',
            // 'status' => 'required',
        ]);

        $data = new SendingCountry();
        $data->country_name = $request->name;
        $data->is_active = $request->status == true ? true : false;
        $data->save();

        return redirect()->back()->with('success', 'Country created successfully.');
    }

    public function getrecievingcountry()
    {
        $allrecievingcountry = ReceivingCountry::all();
        return view('recievecountry.index', compact('allrecievingcountry'));
    }

    public function getrecievingcountrycreate()
    {
        return view('sendcountry.create');
    }

    public function getrecievingcountrydelete($countryId)
    {

        $country = ReceivingCountry::findOrFail($countryId);
        $country->delete();
        return redirect()->back()->with('success', 'Country deleted successfully.');
    }

    public function getrecievingcountrysave(Request $request)
    {
        // dd($request);

        $request->validate([
            'name' => 'required|max:50',
            // 'status' => 'required',
        ]);

        $data = new ReceivingCountry();
        $data->country_name = $request->name;
        $data->is_active = $request->status == true ? true : false;
        $data->save();

        return redirect()->back()->with('success', 'Country created successfully.');
    }

    public function getconversionrate()
    {
        $allconversionRate = ConversionRate::all();
        return view('conversionRate.index', compact('allconversionRate'));
    }

    public function getconversionratecreate()
    {
        $sendcontry = SendingCountry::all();
        $reccontry = ReceivingCountry::all();
        return view('conversionRate.create', compact('sendcontry', 'reccontry'));
    }

    public function getconversionratedelete($ID)
    {

        $country = ConversionRate::findOrFail($ID);
        $country->delete();
        return redirect()->back()->with('success', 'Conversion Rate deleted successfully.');
    }

    public function getconversionratesave(Request $request)
    {
        // dd($request);

        $request->validate([
            // 'name' => 'required|max:50',
            // 'status' => 'required',
        ]);

        $data = new ConversionRate();
        $data->sending_country_id = $request->send;
        $data->receiving_country_id = $request->recive;
        $data->static_rate = $request->static_rate;
        $data->save();

        return redirect()->back()->with('success', 'Country created successfully.');
    }

    public function getcustomrate()
    {
        $allcustomRate = CustomisedRate::all();
        return view('customRate.index', compact('allcustomRate'));
    }

    public function getcustomratecreate()
    {
        $sendcontry = SendingCountry::all();
        $reccontry = ReceivingCountry::all();
        return view('customRate.create', compact('sendcontry', 'reccontry'));
    }

    public function getcustomratedelete($ID)
    {

        $country = CustomisedRate::findOrFail($ID);
        $country->delete();
        return redirect()->back()->with('success', 'Conversion Rate deleted successfully.');
    }

    public function getcustomratesave(Request $request)
    {
        // dd($request);

        $request->validate([
            // 'name' => 'required|max:50',
            // 'status' => 'required',
        ]);

        $data = new CustomisedRate();
        $data->sending_country_id = $request->send;
        $data->receiving_country_id = $request->recive;
        $data->customised_rate = $request->customised_rate;
        $data->rate_type = $request->rate_type;
        $data->save();

        return redirect()->back()->with('success', 'Country created successfully.');
    }
}
