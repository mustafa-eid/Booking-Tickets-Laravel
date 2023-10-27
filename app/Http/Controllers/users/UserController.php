<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

public function index() {
        $parties = DB::table('parties')
            ->select()
            ->where('status', 1)
            ->get();
        return view('users.index', compact('parties'));
}

public function check_auth() {
        return view('users.index');
}

public function about_us() {
    return view('users.about_us');
}

public function contact_us() {
        return view('users.contact_us');
}

public function tiket($id) {
        $parties = DB::table('parties')
        ->select('*')->where('id', $id)
        ->get();
        return view('users.tiket', compact('parties'));
}

public function select_people($id){
        $parties = DB::table('parties')
        ->select('*')->where('id', $id)
        ->get();

        $other_people_price = DB::table('parties')
        ->where('id', $id)
        ->value('other_people_price');

        return view('users.select_people', compact('parties', 'other_people_price'));
}

public function update_other_people(Request $request, $id){
        $email = Auth::user()->email;
        $data = $request->except('_token');

        DB::table('users')
        ->where('email', $email)
        ->update($data);

        return redirect()->route('Ticket_confirmation', $id);
}

public function Ticket_confirmation(Request $request, $id){
        $other_people_price = DB::table('parties')
        ->where('id', $id)
        ->value('other_people_price');

        $other_people = Auth::user()->other_people;

        $other_people_total_price = $other_people_price * $other_people;
        
        
        $parties = DB::table('parties')
        ->select('*')->where('id', $id)
        ->get();
        
        return view('users.Ticket_confirmation', compact('parties', 'other_people_price', 'other_people', 'other_people_total_price'));
}

public function check_auth_users (){
        $parties = DB::table('parties')
        ->select()
        ->get();
        return view('users.index', compact('parties'));
}

}