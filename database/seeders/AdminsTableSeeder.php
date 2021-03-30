<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            "name" => "Hilal Najem",
            "email" => "hilal@gmail.com",
            "password" => Hash::make($input['Hilal123']),
            "super" => true
        ]);
    }
}
