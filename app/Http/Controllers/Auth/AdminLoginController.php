<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

	public function __construct(){
		$this->middleware('guest:admin')->except('adminLogout');
	}
    
	public function showLoginForm(){
		return view('auth.admin-login');
	}

	public function login(Request $request){
		// validate 
		$this->validate($request, [
			'username' => ['required', 'string'],
			'password' => ['required', 'string', 'min:8'],
		]);

		// attempt  to log in
		if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
			// if successful
			return redirect()->intended(route('admin.dashboard'));
		}

		// if unsuccessful
		return redirect()->back()->withInput($request->only('username', 'remember'));

	}

	public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }

}
