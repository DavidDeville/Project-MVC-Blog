<?php

namespace App\Http\Controllers;

use App\Comments;
use App\User;
use App\Billets;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        return view('admin');
    }

    public function display_user_infos()
    {
        $users = User::latest()->take(10)->get();
        //dd($users->username);
        $comments = Comments::latest()->take(10)->get();
        $billets = Billets::latest()->take(10)->get();
        return view('admin', ['comments' => $comments, 'billets' => $billets, 'users' => $users]);
    }
}
