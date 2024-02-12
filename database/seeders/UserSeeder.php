<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 3ユーザ作成する
    User::create([
        'name' => 'test01',
        'email' => 'test01@test',
        'password' => Hash::make('password'),
    ]);
    User::create([
        'name' => 'test02',
        'email' => 'test02@test',
        'password' => Hash::make('password'),
    ]);
    User::create([
        'name' => 'test03',
        'email' => 'test03@test',
        'password' => Hash::make('password'),
    ]);
    }
}
