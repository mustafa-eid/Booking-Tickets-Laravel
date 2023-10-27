<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\traits\ApiTrait;
use Illuminate\Support\Facades\Auth;


class UserVerified
{
    use ApiTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //get user by token using sanctum guard
        $user = Auth::guard('sanctum')->user();
        if(is_null($user) || is_null($user->email_verified_at)){
            return $this->ErrorMessage(['token'=>'token invalid'], 'Unauthenticated', 401);
        }
        return $next($request);
    }
}
