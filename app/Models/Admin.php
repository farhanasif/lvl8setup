<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard= 'system_admin';
    
    protected $fillable = ['name', 'email', 'mobile', 'password', 'image', 'status', 'role'];

    public function isAdmin(){
        return Admin::where("id", $this->id);
    }
}