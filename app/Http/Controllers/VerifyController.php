<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifyController extends Controller
{
    public function VerifyEmail($token = null)
    {
        //dd($token);
        if($token == null) {
            session()->flash('success', 'Invalid Login attempt');
            return redirect('/');
        }
        $user = Admin::where('email_verification_token',$token)->first();
        //dd($user);
        if($user == null ){
            session()->flash('success', 'Invalid Login attempt');
            return redirect('/');
        }

        DB::table('admins')->where('id',$user->id)->update([
            'email_verified' => 1,
        ]);
//        $user->update([
//            'email_verified' => '1',
//        ]);

        session()->flash('success', 'Your account is activated, you can log in now');
        return redirect('/');
    }
}
