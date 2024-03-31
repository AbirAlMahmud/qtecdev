<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $number_of_notes = Auth::user()->notes->count();
        return view('backend.dashboard', compact('number_of_notes'));
    }
}
