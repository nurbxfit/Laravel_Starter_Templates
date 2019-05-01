<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //there are two major middleware guest and auth, 
    //'auth:admin' means to be used by views that require admin authentication
    public function __construct(){
        //middleware to check if we are logged in as admin; refer Refirectiffail middleware
        $this->middleware('guest:admin');
    }
    //return login form view
    public function showLoginForm(){
        //check if logged a session as normal user
        // if there is session as normal user
        if(Auth::guard('web')->check()){
            //then we block request and redirect
            return redirect()->intended(route('user.dashboard'));
        }else{
            return view('auth.adminLogin');
        }
        
    }

    //login function (create account and add into database)
    public function login(Request $request){
        $validated = $this->validateLogin($request);
        
        if($validated){
            $credatials = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            $remember = $request->remember;

            //attempt to login
            if(Auth::guard('admin')->attempt($credatials,$remember)){
                //if success then redirect to admin.dashboard
                return redirect()->intended(route('admin.dashboard'));
            }else{
                //redirect back to login page with email filled the form
                return redirect()->back()->withInput($request->only('email'));
            }
        }


    }


    //validate the login form
    public function validateLogin(Request $request){

        $ok = False;
        //check request origin (from our login form)
        if($request->is('admin/login'))
        {
            //check if method is POST
            if($request->isMethod('post'))
            {
                $this->validate($request,[
                    'email' => 'required|email',
                    'password' => 'required|min:6',
                ]);
                $ok = True;
            }

        }
        return $ok;
    }

}
