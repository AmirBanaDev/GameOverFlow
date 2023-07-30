<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->insert([
            'name'=>'admin',
            'email'=>'admin@a.com',
            'password'=>bcrypt('admin'),
            'role'=>'admin'
        ]);
    }
}
