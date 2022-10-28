<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return view('dashboard');
        } elseif (Auth::user()->hasRole('accountant')) {
            return view('accountant_dashboard');
        } elseif (Auth::user()->hasRole('receptionist')) {
            return view('receptionist_dashboard');
        } elseif (Auth::user()->hasRole('doctor')) {
            return view('doctor_dashboard');
        }
    }
}
