<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BaseController extends Controller
{
    public function __construct()
    {
        $user = $this->__get_current_user();
        if (!$user) {
            Redirect::to('logout')->send();
        }
    }

    protected function __get_current_user()
    {
        if (!session('session_token') || !session()->has('session_token')) {
            Redirect::to('logout')->send();
        }

        $user = User::where('session_token', session('session_token'))->first();
        if (!$user)
            Redirect::to('logout')->send();
        return $user;
    }

}
