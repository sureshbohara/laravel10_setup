<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecorders = [
          ['id'=>1,'name'=>'Suresh Bohara','type'=>'admin','mobile_number'=>9849866998,'email'=>'info@admin.com','password'=>$password,'address'=>'kathmandu Nepal','status'=>1],

          ['id'=>2,'name'=>'Shiwansh Bohara','type'=>'vendor','mobile_number'=>9849866998,'email'=>'info@vendor.com','password'=>$password,'address'=>'kathmandu Nepal','status'=>0],
        ];
        Admin::insert($adminRecorders);
    }
}
