<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'admin',
            'email' => 'fict.krw@horizon.ac.id',
            'password' => Hash::make('Admin@2026'),
            'email_verified_at' => now(),
        ];

        if (Schema::hasColumn('users', 'role')) {
            $data['role'] = 'admin';
        }

        User::updateOrCreate(
            ['email' => 'fict.krw@horizon.ac.id'],
            $data
        );
    }
}
