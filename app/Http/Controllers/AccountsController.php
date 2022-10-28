<?php

namespace App\Http\Controllers;

use App\Models\ServiceList;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function view_service($test_reference)
    {
        return view('service_details', compact('test_reference'));
    }


    public function update_service_list(Request $request, ServiceList $serviceList)
    {
        $serviceList = ServiceList::Where('test_reference', $request->test_reference)->first();

        $serviceList->date            = $request->input('date');
        $serviceList->time            = $request->input('time');
        $serviceList->time_period            = $request->input('time_period');

        $serviceList->discount              = $request->input('discount');
        $serviceList->payment              = $request->input('payment') + $request->input('next_payment');

        $serviceList->due            = $request->input('total') - ($request->input('discount') + $request->input('payment') + $request->input('next_payment'));


        if($serviceList->due > 0)
        {
            $serviceList->account_status = 'Due';
        }else{
            $serviceList->account_status = 'Paid';
        }

        $serviceList->save();
        return redirect()->back()->with('status', 'Add seccessfully');

    }


    public function invoice($test_reference)
    {
        return view('invoice', compact('test_reference'));
    }
}
