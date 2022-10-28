<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdduserController extends Controller
{
    public function add_user()
    {
        
        return view('add_user');
    }

    public function test_result($test_reference)
    {
        return view('test_result', compact('test_reference'));
    }
}
