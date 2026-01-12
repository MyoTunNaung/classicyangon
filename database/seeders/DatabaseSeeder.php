<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Myo Tun Naung',
        //     'email' => 'myotunnoung@gmail.com',
        // ]);

        // Create Super Admin / Initial User
        $user = User::updateOrCreate(
            [
                'email' => 'myotunnoung@gmail.com',
            ],
            [
                'name'         => 'Myo Tun Naung',
                'password'     => Hash::make('password123'), // change after login
                'status'       => 'active',
                'remark'       => 'System Owner',
                'parent_user_id' => null,
                'created_by'   => null,
                'updated_by'   => null,
            ]
        );


        // Run Role & Permission seeder
        $this->call(RolePermissionSeeder::class);





    }
}
