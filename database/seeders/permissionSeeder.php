<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Stores;
use App\Models\User;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
        Permission::create([
            'name' => 'system_management_user', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'data-user', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'create-user', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'edit-user', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'delete-user', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'data-role', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'create-role', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'edit-role', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'delete-role', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'data-permission', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'create-permission', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'delete-permission', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'data-store', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'create-store', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'edit-store', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'delete-store', 
            'guard_name' => 'web'
        ]);

        Permission::create([
            'name' => 'show-store', 
            'guard_name' => 'web'
        ]);

        //take the first number of role data
        $userRole = Role::first();
        $store = Stores::first();

        //give permission to role
        $userRole->givePermissionTo([
            'system_management_user',
            'data-user',
            'create-user',
            'edit-user',
            'delete-user',
            'data-role',
            'create-role',
            'edit-role',
            'delete-role',
            'data-permission',
            'create-permission',
            'delete-permission',
            'data-store',
            'create-store',
            'edit-store',
            'delete-store',
            'show-store'
        ]);

        //create user
        $user = User::create([
            'id'        => (string) Str::uuid(),
            'firstname' => 'Imam',
            'lastname'  => 'Sudarajat',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password'),
            'phonenumber'=> '081234567890',
            'gender'     => 'man',
            'status'     => 'active',
            'store_id'   => $store->id
        ]);

        //assign role to user
        $user->assignRole($userRole);

    }
}
