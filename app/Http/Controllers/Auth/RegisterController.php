<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Validation\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    use RegisterRequest;

    public function ShowRegisterForm(){
        return view('auth.register');
    }

    public function HandleRegister(Request $request)
    {
        $this->inputDataSanitization($request->all());
        //dd($request->all());
        $user = Admin::create([
        'name' => trim($request->input('name')),
        'mobile' => $request->input('mobile'),
        'email' => strtolower($request->input('email')),
        'password' => Hash::make($request->input('password')),
        'email_verification_token' => Str::random(32),
        'role' =>'user',
        'status' =>1
    ]);

        \Mail::to($user->email)->send(new VerificationEmail($user));

        session()->flash('success', 'Please check your email to activate your account');

        return redirect()->back();

    }
}
