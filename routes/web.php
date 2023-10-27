<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admins\AdminController;
use App\Http\Controllers\users\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $parties = DB::table('parties')
    ->select()->where('status', 1)
    ->get();
    return view('users.index', compact('parties'));
});


//Routes for users
Route::group(['prefix' => 'users'], function () {
    Route::get('/home', [UserController::class, 'index'])->name('index');
    Route::get('/about_us', [UserController::class, 'about_us'])->name('about_us');
    Route::get('/contact_us', [UserController::class, 'contact_us'])->name('contact_us');

    Route::group(['prefix'=>'auth', 'middleware'=>'verified'], function(){
            Route::get('/', [UserController::class, 'check_auth_users'])->name('check_auth_users');
            Route::get('/tiket/{id}', [UserController::class, 'tiket'])->where('id', '[0-9]+')->name('tiket');
            Route::get ('/select_people/{id}', [UserController::class, 'select_people'])->name('select_people');
            Route::post ('/update_other_people/{id}', [UserController::class, 'update_other_people'])->name('update_other_people');
            Route::get ('/Ticket_confirmation/{id}', [UserController::class, 'Ticket_confirmation'])->name('Ticket_confirmation');
    });
});
Auth::routes(['verify'=>true]);


// Routes for dashboard
Route::group(['prefix'=>'dashboard'], function(){
    Route::match(['get', 'post'], '/login', [AdminController::class, 'showLoginAdmin'])->name('showLoginAdmin');
    Route::match(['get', 'post'], '/adminLogin', [AdminController::class, 'login'])->name('admin_login');
    Route::get('/home/{type}', [AdminController::class, 'adminType'])->name('adminType');

        // parties routing group
        Route::prefix('parties')->group(function () {
            Route::match(['get', 'post'], '/all_parties/{type}', [AdminController::class, 'all_parties'])->name('all_parties');
            Route::delete('/delete_party/{id}', [AdminController::class, 'delete_party'])->name('delete_party');
            Route::get('/create_party/{type}', [AdminController::class, 'create_party'])->name('create_party');
            Route::post('/store_party/{type}', [AdminController::class, 'store_party'])->name('store_party');
            Route::get('/edit_party/{id}/{type}', [AdminController::class, 'edit_party'])->name('edit_party');
            Route::post('/update_party/{id}/{type}', [AdminController::class, 'update_party'])->name('update_party');
        });

        // parties routing group
        Route::prefix('admins')->group(function () {
            Route::get('/all_admins/{type}', [AdminController::class, 'all_admins'])->name('all_admins');
            Route::delete('/delete_admin/{id}', [AdminController::class, 'delete_admin'])->name('delete_admin');
            Route::get('/edit_admin/{id}/{type}', [AdminController::class, 'edit_admin'])->name('edit_admin');
            Route::post('/update_admin/{id}/{type}', [AdminController::class, 'update_admin'])->name('update_admin');
            Route::get('/create_admin/{type}', [AdminController::class, 'create_admin'])->name('create_admin');
            Route::post('/store_admin/{type}', [AdminController::class, 'store_admin'])->name('store_admin');
        });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');