<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //phanloai	lydo	ngayxinphep	songaynghi	users_id	reason_id	trangthai
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Phượng',
            'date'=>'28/10/2001',
            //'email' => 'ninhphuong2k1nb@gmail.com',
            'password' => Hash::make('123456'),
            'phone' => '0868195800' ,
            'username' => 'ninhphuong',
            'level'=> 'nhân viên',
            'status'=>'đang làm',
            'role'=>1
        ]);
        \App\Models\Later::factory()->create([
            'phanloai' => 'ốm',
            'lydo'=>'mệt mỏi, đau họng',
            'ngayxinphep' => '28/10/2022',
            'songaynghi' => 3,
            'users_id' => 20,
            'reason_id'=> 2,
            'trangthai'=>0,
        ]);
    }
}
