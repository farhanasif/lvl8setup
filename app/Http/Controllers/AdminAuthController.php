<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Validation\RegisterRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    use RegisterRequest;

    private $errors= [];

    protected $redirectTo = '/dashboard';

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request){
    	$request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $this->loginDataSanitization($request->except(['_token']));

        $credentials = $request->except(['_token']);

        $auth = Admin::where('email','=', $request->email)->first();
        //dd($auth);
        if ($auth) {
            if($auth->email_verified == 1) {
                //dd($auth->email_verified);
                if (Hash::check($request->password, $auth->password)) {
                    session([
                        'id' => $auth->id,
                        'name' => $auth->name,
                        'email' => $auth->email,
                        'role' => $auth->role,
                    ]);
                    if ($auth->role == 'admin') {
                        return redirect('/dashboard');
                    } elseif ($auth->role == 'user') {
                        return redirect('/user/dashboard');
                    } else {
                        return redirect('/');
                    }

                } else {
                    return redirect('/')
                        ->withInput($request->only('email'))
                        ->withErrors($this->errors);
                }
            }
        }else{
            return back()->with('failed','No Account For This Email');
        }
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
        return redirect('/');
    }
}
