<?php

namespace App\Http\Controllers\Apis\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\ApiTrait;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CheckCodeRequest;

class EmailVerificationController extends Controller
{
    use ApiTrait;

    public function sendCode(Request $request)
    {
        //get token from header
        $token = $request->header('Authorization');
        //get user by token using sanctum guard
        $authenticatedUser = Auth::guard('sanctum')->user();
        //generate code
        $code = rand(10000, 99999);
        //generate expiration date
        $code_expired_at = date('Y-m-d H:i:s', strtotime('+2 minutes'));
        //save code with date in database
        $user = User::find($authenticatedUser->id);
        $user->code = $code;
        $user->code_expired_at = $code_expired_at;
        $user->save();
        //add token property in user object
        $user->token = $token;
        //send mail
        Mail::to($user)->send(new EmailVerification($user));
        //return use data
        return $this->Data(compact('user'));
    }

    public function checkCode(CheckCodeRequest $request)
    {
        //get token from header
        $token = $request->header('Authorization');
        //get user by token using sanctum guard
        $authenticatedUser = Auth::guard('sanctum')->user();
        $user = User::find($authenticatedUser->id);
        //store time and date now in variable
        $now_date = date('Y-m-d H:i:s');
        //check if code correct in database and code not expired
        if($user->code == $request->code && $user->code_expired_at > $now_date){
            //update verified at in database
            $user->email_verified_at = $now_date;
            $user->save();
            //add token property in user object
            $user->token = $token;
            //return use data
            return $this->Data(compact('user'));     
        }else{
            //add token property in user object
            $user->token = $token;
            return $this->Data(compact('user'), 'user not verefied', 401);
        }
    }
}
