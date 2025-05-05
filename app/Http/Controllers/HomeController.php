<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function dashboard(Request $request)
    {
        return view('dashboard');
    }
}
