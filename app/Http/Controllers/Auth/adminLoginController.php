<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class adminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        // validate the form data
        $this -> validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        //attempt to log the user in
        if(Auth::guard('admin')->attempt(['username'=>$request->username, 'password'=> $request->password])){
            //if success then redirect to
            return redirect()->intended(route('admin.dashboard'));
        }
        //if unsuccess then redirect to login form
        return redirect()->back()->withInput($request->only('username'));
    }
}
