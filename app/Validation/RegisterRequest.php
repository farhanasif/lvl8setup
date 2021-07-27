<?php

namespace App\Validation;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

Trait RegisterRequest
{

   public function inputDataSanitization($data)
   {
   //dd(session('id'));

    $validator = Validator::make($data, [
    'name' => 'required',
    'email' => 'required',
    'mobile' => 'required',
    'password' => 'required|min:6|confirmed',
    ]);

    if($validator->fails()){
    return redirect()->back()->withErrors($validator)->withInput();

    }
    return $validator;
  }

public function loginDataSanitization($data){
    $validator = Validator::make($data, [
    'email' => 'required',
    'password' => 'required|min:6|confirmed',
    ]);

    if($validator->fails()){

        return redirect()->back()->withErrors($validator)->withInput();

    }

    return $validator;
  }
}