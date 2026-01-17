<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'dashboard',

            'organization.view',
            'organization.create',
            'organization.edit',
            'organization.delete',
            'organization.owner',

            'teacher.view',
            'teacher.create',
            'teacher.edit',
            'teacher.delete',
            'teacher.owner',

            'category.view',
            'category.create',
            'category.edit',
            'category.delete',
            'category.owner',

            'course.view',
            'course.create',
            'course.edit',
            'course.delete',
            'course.owner',

            'lesson.view',
            'lesson.create',
            'lesson.edit',
            'lesson.delete',
            'lesson.owner',

            'enrollment.view',
            'enrollment.create',
            'enrollment.edit',
            'enrollment.delete',
            'enrollment.owner',

            'payment.view',
            'payment.create',
            'payment.edit',
            'payment.delete',
            'payment.owner',

            'payment_method.view',
            'payment_method.create',
            'payment_method.edit',
            'payment_method.delete',
            'payment_method.owner',

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        $superAdmin->syncPermissions($permissions);

        $user = User::where('email', 'myotunnoung@gmail.com')->first();
        $user->assignRole('Super Admin');

    }
}
