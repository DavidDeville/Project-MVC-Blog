<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
        /**

     * The Guard implementation.

     *

     * @var \Illuminate\Contracts\Auth\Guard

     */

    protected $auth;


    /**

     * @param \Illuminate\Contracts\Auth\Guard $auth

     */

    public function __construct(Guard $auth)

    {

        $this->auth = $auth;

    }
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
            $user = $this->auth->user();
            if ($user->status == true) {
                \Session::flush();
                $message = 'Votre compte a été banni. Si vous estimez cette décision injustifiée, veuillez contacter l\'administrateur du site';
                return redirect('login')->withMessage($message);
            }
        }
        return $next($request);
    }
}
