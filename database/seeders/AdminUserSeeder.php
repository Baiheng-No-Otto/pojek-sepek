<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public const DEFAULT_EMAIL = 'admin@skindecide.test';

    public const DEFAULT_PASSWORD = 'Admin12345!';

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => self::DEFAULT_EMAIL],
            [
                'name' => 'Administrator',
                'password' => Hash::make(self::DEFAULT_PASSWORD),
                'is_admin' => true,
                'email_verified_at' => now(),
            ],
        );
    }
}
