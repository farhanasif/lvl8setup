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
}
