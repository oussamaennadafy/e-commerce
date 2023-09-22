<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    //
    public function dashboard(Request $request)
    {
        return view('vendor.dashboard.dashboard', compact('request'));
    }
}
