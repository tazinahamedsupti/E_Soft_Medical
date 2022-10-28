<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Http\Request;
use PHPUnit\Util\Test as UtilTest;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test_category_entry');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test_entry()
    {
        return view('test_entry');
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
        $test_category = new Test;

        $test_category->main_category            = $request->input('main_category');
        $test_category->sub_category            = $request->input('sub_category');
        $test_category->save();
        return redirect()->back()->with('status', 'Add seccessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(test $r)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(test $r)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, test $r)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test_category = test::find($id);
        $test_category->delete();
        return redirect()->back()->with('status', 'Deleted seccessfully');
    }
}
