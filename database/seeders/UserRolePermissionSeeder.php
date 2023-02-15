<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        try {
            $superadmin = User::create(array_merge([
                'name' => 'superadmin@gmail.com',
                'email' => 'superadmin',
            ], $default_user_value));
    
            $admin = User::create(array_merge([
                'name' => 'admin@gmail.com',
                'email' => 'admin',
            ], $default_user_value));
    
            $user = User::create(array_merge([
                'name' => 'user@gmail.com',
                'email' => 'user',
            ], $default_user_value));
    
            $role_superadmin = Role::create(['name' => 'superadmin']);
            $role_admin = Role::create(['name' => 'admin']);
            $role_user = Role::create(['name' => 'user']);
    
            $permission = Permission::create(['name' => 'CANREAD']);
            $permission = Permission::create(['name' => 'CANCREATE']);
            $permission = Permission::create(['name' => 'CANUPDATE']);
            $permission = Permission::create(['name' => 'CANDELETE']);
    
            $superadmin->assignRole('superadmin');
            $admin->assignRole('admin');
            $user->assignRole('user');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
    }
}
