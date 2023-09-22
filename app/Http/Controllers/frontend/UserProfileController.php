<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function index(Request $request): View
    {
        // dd($request);
        return view('frontend.dashboard.profile', compact('request'));
    }
}
