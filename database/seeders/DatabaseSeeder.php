<?php

namespace Database\Seeders;

use App\Laravel\Models\Admin;
use App\Laravel\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'user@example.com'], ['name' => 'Test User', 'password' => 'password']);
        Admin::updateOrCreate(['email' => 'admin@example.com'], ['name' => 'Test Admin', 'password' => 'password']);
    }
}
