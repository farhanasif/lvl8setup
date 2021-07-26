<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'mobile'=>'01723093865',
            'password'=>Hash::make('123456'),
            'status'=>1,
            'role'=>'admin'
        ]);
    }
}
