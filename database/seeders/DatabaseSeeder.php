<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Laptop;
use App\Models\Tasset;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=>'administrator',
            'email'=>'admin@mail.com',
            'password'=>bcrypt("P@ssw0rdIPI2024"),
            
        ]);

       
}
}