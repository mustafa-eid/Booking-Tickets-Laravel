<?php

namespace App\Http\Controllers\admins;

use App\Models\Admin;
use App\Http\traits\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\StorePartyRequest;
use App\Http\Requests\UpdatePartyRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class AdminController extends Controller
{
    use AuthenticatesUsers;
    use media;

public function showLoginAdmin()
{
    return view('admins.Auth.login');
}

public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
        'password' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $email = $request->input('email');
    $password = $request->input('password');

    $admin = Admin::where('email', $email)->first();

    if (!$admin) {
        return redirect()->back()->withErrors(['email' => 'This Admin does not exist.']);
    }

    $password_table = str_replace("\r\n", '', $admin->password);

    if ($password === $password_table) {
        if ($admin->type === 'superAdmin') {
            session(['super' => $admin->type]);
        } elseif ($admin->type === 'admin') {
            session(['super' => 'admin']);
        }
        $type = session('super');

        if ($type) {
            return redirect()->route('adminType', ['type' => $type]);
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
        }
    } else {
        return redirect()->back()->withErrors(['email' => 'Invalid email or password.']);
    }
}

public function adminType($type){
    $admin_name = Admin::where('type', $type)->first();
    return view('admins.dashboard', compact('type', 'admin_name'));
}

public function all_parties($type)
{
    $admin_name = Admin::where('type', $type)->first();
    $products = DB::table('parties')->get();
    return view('admins.products.parties.all_parties', compact('products', 'type', 'admin_name'));
}


public function delete_party($id)
{
    $party = DB::table('parties')->select('image')->where('id', $id)->first();
    if ($party) {
        $oldImageName = $party->image;
        $image_path = public_path('/dist/img/products/') . $oldImageName;
        if (file_exists($image_path) && is_file($image_path)) {
            unlink($image_path);
        }
        DB::table('parties')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Operation!');
    }
}


public function create_party($type)
{
    $admin_name = Admin::where('type', $type)->first();
    return view('admins.products.parties.create_party', compact('type', 'admin_name'));
}

public function store_party(StorePartyRequest $request, $type)
{
    $PhotoName = $this->uploade_image($request->image, 'products');
    $data = $request->except('_token', 'image', 'page');
    $data['image'] = $PhotoName;

    DB::table('parties')->insert($data);
    return $this->redirectAccordingToRequest($request, $type);
}

public function edit_party($id, $type)
{
    $admin_name = Admin::where('type', $type)->first();
    $party = DB::table('parties')->where('id', $id)->first();
    return view('admins.products.parties.edit_party', compact('party', 'type', 'admin_name'));
}

public function update_party(Request $request, $id, $type)
{

    
    //all data except
    $data = $request->except('_token', '_method', 'page', 'image', 'type');
    // dd($data);
    
    //if image exists => upload it
    if($request->has('image')){
    if(empty($request->image)){
        $old_Image_Name = DB::table('parties')->select('image')->where('id', $id)->first()->image;
        $image_path = public_path('/dist/img/products/') . $old_Image_Name;
        $request->image = $image_path;
    }

    //delete old image from server
    $old_Image_Name = DB::table('parties')->select('image')->where('id', $id)->first()->image;
    $image_path = public_path('/dist/img/products/') . $old_Image_Name;
    $this->delete_image($image_path);

    //Upload image to '/dist/img/products'
    $PhotoName = $this->uploade_image($request->image, 'products');

    //add image name to array
    $data['image'] = $PhotoName;
    }

    //update this product in database
    DB::table('parties')
    ->where('id', $id)
    ->update($data);

    //check any page redirect
    return $this->redirectAccordingToRequest($request, $type);
}

private function redirectAccordingToRequest($request, $type)
{
    if ($request->page == 'back') {
        return redirect()->back()->with('success', 'Successfully Operation!');
    } else {
        return redirect()->route('all_parties', compact('type'))->with('success', 'Successfully Operation!');
    }
}


public function all_admins($type)
{
    $admin_name = Admin::where('type', $type)->first();
    $admins = DB::table('admins')->get();
    return view('admins.products.admins.all_admins', compact('admins', 'type', 'admin_name'));
}

public function delete_admin($id)
{
    DB::table('admins')->where('id', $id)->delete();
    return redirect()->back()->with('success', 'Successfully Operation!');
}

public function edit_admin($id, $type)
{
    $admin_name = Admin::where('type', $type)->first();
    $admin = DB::table('admins')->where('id', $id)->first();
    return view('admins.products.admins.edit_admin', compact('admin', 'type', 'admin_name'));
}

public function update_admin(Request $request, $id, $type)
{
    $data = $request->validate([
        'status' => ['required', 'boolean'],
        'type' => ['required', 'string'],
    ]);

    DB::table('admins')->where('id', $id)->update($data);
    $admin = DB::table('admins')->where('id', $id)->first();

    return $this->redirectAccordingToRequestAdmins($request, $type);
}

public function create_admin($type)
{
    $admin_name = Admin::where('type', $type)->first();
    return view('admins.products.admins.create_admin', compact('type', 'admin_name'));
}

public function store_admin(StoreAdminRequest $request, $type)
{
    $data = $request->except('_token', 'image', 'page');
    DB::table('admins')->insert($data);
    return $this->redirectAccordingToRequestAdmins($request, $type);
}

private function redirectAccordingToRequestAdmins($request, $type)
{
    if ($request->page == 'back') {
        return redirect()->back()->with('success', 'Successfully Operation!');
    } else {
        return redirect()->route('all_admins', compact('type'))->with('success', 'Successfully Operation!');
    }
}
}