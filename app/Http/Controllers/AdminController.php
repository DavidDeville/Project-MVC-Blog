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
        $comments = Comments::latest()->take(10)->get();
        $billets = Billets::latest()->take(10)->get();
        return view('admin', ['comments' => $comments, 'billets' => $billets, 'users' => $users]);
    }

    public function display_users_billets()
    {
        $billets = Billets::paginate(5);
        return view('admin_billets', ['billets' => $billets]);
    }

    public function display_users()
    {
        $users = User::paginate(5);
        return view('admin_users', ['users' => $users]);
    }

    public function display_users_comments()
    {
        $comments = Comments::paginate(5);
        return view('admin_comments', ['comments' => $comments]);
    }

    public function modify_users()
    {
        $user_type = $_POST['users'];
        $user_id = intval($_POST['user_id']);
        User::where('id', $user_id)->update(['type' => $user_type]);
        return view('admin_users', ['users' => User::paginate(5)]);
    }

    public function users_management()
    {
        $users = User::paginate(5);
        return view('admin_banhammer', ['users' => $users]);
    }

    public function users_ban_management()
    {
        $user_status = intval($_POST['user_status']);
        $user_id = intval($_POST['user_id']);
        User::where('id', $user_id)->update(['status' => $user_status]);
        return view('admin_banhammer', ['users' => User::paginate(5)]);
    }
}
