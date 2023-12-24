<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create users 
        $admin = User::create([
            'name' => 'Admin', 
            'email' => 'quorumit@gmail.com',
            'password' => 'admin123'
        ]);

        $user = User::create([
            'name' => 'User', 
            'email' => 'user@gmail.com',
            'password' => 'user123'
        ]);

        $secretary = User::create([
            'name' => 'secretary', 
            'email' => 'secretary@gmail.com',
            'password' => 'secretary123'
        ]);

        // create roles 
        $roleAdmin = Role::create([
            'name' => 'admin'
        ]);
        $roleUser = Role::create([
            'name' => 'user'
        ]);

        $roleSecretary = Role::create([
            'name' => 'secretary'
        ]);

        // create permissions 
        $p1 = Permission::create(['name' => 'Create user']);
        $p2 = Permission::create(['name' => 'Update user']);
        $p3 = Permission::create(['name' => 'Show user']);
        $p4 = Permission::create(['name' => 'Delete user']);

        $p5 = Permission::create(['name' => 'Create product']);
        $p6 = Permission::create(['name' => 'Update product']);
        $p7 = Permission::create(['name' => 'Show product']);
        $p8 = Permission::create(['name' => 'Delete product']);

        $p9 = Permission::create(['name' => 'Create role']);
        $p10 = Permission::create(['name' => 'Update role']);
        $p11 = Permission::create(['name' => 'Show role']);
        $p12 = Permission::create(['name' => 'Delete role']);

        $p13 = Permission::create(['name' => 'Create permission']);
        $p14 = Permission::create(['name' => 'Update permission']);
        $p15 = Permission::create(['name' => 'Show permission']);
        $p16 = Permission::create(['name' => 'Delete permission']);

        // permissions for admin rol
        $permissions = Permission::pluck('id', 'id')->all();
        $roleAdmin->syncPermissions($permissions);

        // permissions for others users roles
        $roleUser->syncPermissions([$p3, $p7]);
        $roleSecretary->syncPermissions($p1, $p2, $p3, $p5, $p6, $p7);

        // assign roles a users
        $admin->assignRole([$roleAdmin->id]);
        $user->assignRole([$roleUser->id]);
        $secretary->assignRole([$roleSecretary->id]);
    }
}
