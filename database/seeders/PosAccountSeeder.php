<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\User;

class PosAccountSeeder extends Seeder
{
    public function run(): void
    {
        // Insert five sample customers
        $customers = [
            [
                'full_name' => 'Juan Dela Cruz',
                'email' => 'juan@example.com',
                'phone' => '09171234567',
            ],
            [
                'full_name' => 'Maria Santos',
                'email' => 'maria@example.com',
                'phone' => '09181234567',
            ],
            [
                'full_name' => 'Pedro Reyes',
                'email' => 'pedro@example.com',
                'phone' => '09191234567',
            ],
            [
                'full_name' => 'Ana Garcia',
                'email' => 'ana@example.com',
                'phone' => '09201234567',
            ],
            [
                'full_name' => 'Carlo Mendoza',
                'email' => 'carlo@example.com',
                'phone' => '09211234567',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::updateOrCreate(
                ['email' => $customer['email']],
                $customer + ['created_at' => now()]
            );
        }

        // Insert five sample system users
        $users = [
            [
                'username' => 'admin',
                'full_name' => 'Admin User',
            ],
            [
                'username' => 'johnsmith',
                'full_name' => 'John Smith',
            ],
            [
                'username' => 'sarahlopez',
                'full_name' => 'Sarah Lopez',
            ],
            [
                'username' => 'markreyes',
                'full_name' => 'Mark Reyes',
            ],
            [
                'username' => 'annacruz',
                'full_name' => 'Anna Cruz',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']],
                $user + ['created_at' => now()]
            );
        }
    }
}