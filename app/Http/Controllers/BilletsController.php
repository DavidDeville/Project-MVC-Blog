<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as req;
use Illuminate\Support\Facades\Redirect;
use App\Billets;
use App\User;

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

        Billets::create($data);
        return view('billets/new', ['mess' => "le billet a bien été envoyé"]);
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
        $billets = Billets::paginate(1);
        return view('billets/read', ['posts' => $billets, 
        'current_user' => Auth::user()->id]);
    }

    public function destroy($id)
    {
        Billets::where('id', $id)->delete();
        return Redirect::to('billets/read');
    }

    public function display_edit($id)
    {
        return view('billets/update', ['posts' => Billets::findOrFail($id)]);
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
            'success' => 'Le billet a bien été modifié']);
        }
        else {
            return Redirect::to('billets/read');
        }
        //return view('billets/read', ['posts' => Billets::all(), 'current_user' => Auth::user()->id]);
    }
}
