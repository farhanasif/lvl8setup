<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    use HasFactory;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guard= 'system_admin';
    
    protected $fillable = ['name', 'email', 'mobile', 'password', 'image', 'status', 'role','email_verification_token'];

    public function isAdmin(){
        return Admin::where("id", $this->id);
    }
}