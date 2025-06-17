<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role admin jika belum ada
        Role::firstOrCreate(['name' => 'admin']);

        // Buat atau update user admin
        $admin = User::updateOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'password' => 'password123', // TANPA bcrypt, karena model pakai 'hashed'
            'email_verified_at' => now(),
        ]);

        // Assign role admin
        $admin->assignRole('admin');
    }
}
