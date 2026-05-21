<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public const DEFAULT_USERNAME = 'admin';

    public const DEFAULT_PASSWORD = 'admin123';

    public function run(): void
    {
        User::updateOrCreate(
            ['username' => self::DEFAULT_USERNAME],
            [
                'name' => 'Administrator',
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'is_admin' => true,
                'username_verified_at' => now(),
            ],
        );
    }
}
