<?php

namespace App\Http\Controllers;

use App\Models\test_info;
use Illuminate\Http\Request;

class TestInfoController extends Controller
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
        $test_category = new test_info();

        $test_category->sub_category            = $request->input('sub_category');
        $test_category->test_name            = $request->input('test_name');
        $test_category->price            = $request->input('price');
        $test_category->referref_fee            = $request->input('referref_fee');

        $test_category->save();
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

    public function findPrice(Request $request)
    {
        $p=test_info::select('price')->where('id', $request->id)->first();
        return response()->json($p);
    }

    public function findReferrer(Request $request)
    {
        $q=test_info::select('referref_fee')->where('id', $request->id)->first();
        return response()->json($q);
    }

    public function findTestId(Request $request)
    {
        $q=test_info::select('id')->where('id', $request->id)->first();
        return response()->json($q);
    }
}
