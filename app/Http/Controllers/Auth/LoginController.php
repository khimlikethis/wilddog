<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Auth;
use Hash;

class LoginController extends Controller
{

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        $adminLogin = array(
            'email' => $request->get("email"),
            'password' => $request->get("password"),
        );

        if (Auth::attempt(['email' => $request->get("email"), 'password' => $request->get("password"),'status' => 1])) {
            return redirect()->intended('/');
        }
        $admin = User::where('email', $request->get("email"))
        //->wherePassword(Hash::Make($request->get("password")))
        ->first();

       //dd(Hash::Make('12345678'));

        if (Hash::check($request->get("password"), $admin->password)) {
            return redirect('auth/login')->with('msg', 'Your account is not active.');
        }else {
            return redirect('auth/login')->with('msg', 'Email not found.');
        }
        if (empty($admin)) {
            return redirect('auth/login')
                ->withInmsg_errorput($request->only('email'))
                ->with('msg', $this->getFailedLoginMessage())
                ->withErrors([
                    'email' => $this->getFailedLoginMessage(),
                ]);
        } 
    }
    public function logout()
    {
        Session::flush();//Auth::logout();
        return redirect('auth/login');
    }
    private function getFailedLoginMessage()
    {
        return 'Email or Password incorrect';
    }
    
}
