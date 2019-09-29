<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as req;
use Illuminate\Support\Facades\Redirect;
use App\Billets;
use App\User;
use App\Comments;

class BilletsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'tags' => ['required', 'string', 'min:255'],
            'content' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new article instance after a valid registration.
     *
     * @param  array  $data
     * 
     * @return \App\User
     */
    protected function create_article()
    {
        $data = request()->validate([
            'title' => ['required'],
            'content' => ['required'],
            'tags' => ['required'],
        ]);
        $data['user_id'] = Auth::user()->id;
        $user = Auth::user();
        // dd($user->type);
        Billets::create($data);
        return view('billets/new', ['mess' => "le billet a bien été envoyé", 'user_type' => $user->type ]);
    }

    /**
     * Create a new article instance after a valid registration.
     *
     * @param  array  $data
     * 
     * @return \App\User
     */
    protected function read_all_articles()
    {
        $billets = Billets::paginate(5);
        $user_type = User::all();
        return view('billets/read', ['posts' => $billets, 
        'current_user' => Auth::user()->id, 'user_type' => Auth::user()->type]);
    }

    public function destroy($id)
    {
        Billets::where('id', $id)->delete();
        return Redirect::to('billets/read');
    }

    public function display_edit($id)
    {
        return view('billets/update', ['posts' => Billets::findOrFail($id), 'currentuser' => Auth::user()->id]);
    }

    public function display_comments_page($id)
    {
        if(Billets::find($id) == false) {
            abort(404);
        }
        else {
            $comments = Billets::find($id)->comments;
            return view('billets/billet_comment', ['posts' => Billets::findOrFail($id), 'currentuser' => Auth::user()->id, 'comments' => $comments]);
        }
    }

    public function billet_edit(Request $request, $id)
    {
        Billets::where('id', $id)->update(
            $request->only('title', 'content', 'tags', 'updated_at')
        );
        $current_url = req::server('HTTP_REFERER');
        if(isset($current_url)) {
            return view('billets/update', 
            ['posts' => Billets::findOrFail($id), 
            'success' => 'Le billet a bien été modifié',
            'currentuser' => Auth::user()->id]);
        }
        else {
            return Redirect::to('billets/read');
        }   
    }
}
