<?php

namespace App\Http\Controllers\Apis\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\traits\ApiTrait;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    use ApiTrait;

    public function login(LoginRequest $request){
        $user = User::where('email', $request->email)->first();
        //check if password not much
        if(! Hash::check($request->password, $user->password)){
            return $this->ErrorMessage(['email'=>'the provided credentials are incorrect'],'wrong attempt', 401);
        }
        //genrate tokeb by sanctum package
        $user->token = "Bearer ".$user->createToken($request->device_name)->plainTextToken;
        //check if email verefied at not null
        if(is_null($user->email_verified_at)){
            //return all data with token becaus if user need send new code
            return $this->Data(compact('user'), 'not verefird', 401);
        }
        return $this->Data(compact('user'));
    }

    public function logout(Request $request){
        //get user by token using sanctum guard
        $authenticatedUser = Auth::guard('sanctum')->user();
        //get id only form this token
        $token = $request->header('Authorization');
        $brearWithId = explode('|', $token)[0];
        $tokenId = explode(' ', $brearWithId)[1];
        //delete thie token from databse by id
        $authenticatedUser->tokens()->where('id', $tokenId)->delete();
        return $this->SuccessMessage('user logged out seccessfully');
    }

    public function logoutAllDevices()
    {
        //get user by token using sanctum guard
        $authenticatedUser = Auth::guard('sanctum')->user();
        //delete all tokens from all devices
        $authenticatedUser->tokens()->delete();
        return $this->SuccessMessage('user logged out seccessfully from all devices');
    }

}
