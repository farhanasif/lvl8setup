<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class HomeController extends Controller
{
    public function index(){
    	return view('dashboard.dashboard');
    }

    public function otherDashboard(){
    	return view('dashboard.other_dashboard');
    }

    public function showRegisterUser(){
        //$query=Question::orderBy('id','DESC')->where('status',1);
        $users=Admin::orderBy('id','DESC')
            ->where('status',1)
            ->where('role','user')
            ->where('email_verified',1)->get();
        //dd($user);
        return view('users.allUser')->with(compact('users'));
    }
}
