<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Apis\ProductController;
use App\Http\Controllers\Apis\Auth\LoginController;
use App\Http\Controllers\Apis\Auth\RegisterController;
use App\Http\Controllers\Apis\Auth\EmailVerificationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//apis for products
Route::group(['prefix'=>'products', 'middleware'=>'UserVerified'], function(){
    Route::get('/', [ProductController::class, 'index']);

    Route::get('/create', [ProductController::class, 'create']);
    Route::post('/store', [ProductController::class, 'store']);

    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::post('/update/{id}', [ProductController::class, 'update']);

    Route::post('/destroy/{id}', [ProductController::class, 'destroy']);
});


//apis for users
Route::group(['prefix'=>'users'], function(){
    Route::post('/register', RegisterController::class);
    Route::delete('/logout', [LoginController::class, 'logout']);
    Route::delete('/logout-all-devices', [LoginController::class, 'logoutAllDevices']);
    Route::post('/login', [LoginController::class, 'login']);

    Route::group(['middleware'=>'auth:sanctum'], function(){
        Route::post('/send-code', [EmailVerificationController::class, 'sendCode']);
        Route::post('/check-code', [EmailVerificationController::class, 'checkCode']);
    });
});