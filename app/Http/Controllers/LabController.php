<?php

namespace App\Http\Controllers;

use App\Models\GenerateRandomValue;
use App\Models\Lab_test;
use App\Models\ServiceList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysqli;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new ServiceList;

        $service->patient_id            = $request->input('patient_id');
        $service->test_reference            = $request->input('test_reference');
        $service->total            = $request->input('total');
        $service->discount            = $request->input('discount');
        $service->payment            = $request->input('payment');



        // $service->due            = $request->input('due');

        $service->due            = $request->input('total') - ($request->input('discount') + $request->input('payment'));




        $service->date            = $request->input('date');
        $service->time            = $request->input('time');
        $service->time_period            = $request->input('time_period');
        $service->report_status            = $request->input('report_status');

        $service->save();



        if($request->input('total') > ($request->input('discount') +  $request->input('payment')))
        {
            $service->account_status = 'Due';
        }else{
            $service->account_status = 'Paid';
        }

        


        // dd($service->patient_id            = $request->input('patient_id'));
        $service->save();


        $data = DB::select('select id from random_test_reference where patient_id = ?', [$service->patient_id= $request->input('patient_id')]);
        #dd($data);

        foreach ($data as $get){
            $data = DB::delete('delete from random_test_reference where id = ?', [$get->id]);
        }

        // die();

        return redirect()->back()->with('status', 'Add seccessfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function testrecord(Request $request)
    {
        $labrecord = new Lab_test;
        $labrecord->patient_id            = $request->input('patient_id');
        $labrecord->test_id              = $request->input('test_id');
        $labrecord->test_reference              = $request->input('test_reference');
        $labrecord->save();
        // return redirect()->back()->with('status', 'Add seccessfully');


        $random = new GenerateRandomValue();
        $random->patient_id            = $request->input('patient_id');
        $random->test_reference            = $request->input('test_reference');
        $random->save();
        return redirect()->back()->with('status', 'Add seccessfully');
    }
}
