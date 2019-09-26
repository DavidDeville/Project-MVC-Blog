<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function delete_user()
    {
        Auth::User()->delete();
        return Redirect::to('/register');
    }
}
