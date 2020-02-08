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
        if (Auth::attempt($adminLogin)) {
            return redirect()->intended('/');
        }
        //dd($adminLogin);
        $admin = User::where('email', $request->get("email"))
        ->wherePassword(Hash::Make($request->get("password")))
        ->first();
        if (empty($admin)) {
            return redirect('auth/login')
                ->withInmsg_errorput($request->only('email'))
                ->with('msg', $this->getFailedLoginMessage())
                ->withErrors([
                    'email' => $this->getFailedLoginMessage(),
                ]);
        } else {
            return redirect('auth/login')
                ->withInmsg_errorput($request->only('email'))
                ->with('msg', 'Your account is not active.')
                ->withErrors([
                    'email' => 'Your account is not active.',
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
