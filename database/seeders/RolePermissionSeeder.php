<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Begin ROLE Define :: # 
        $role_super_admin = Role::create(['name' => 'super admin','description' => 'Super user account']);
        $role_admin = Role::create(['name' => 'admin','description' => 'Admin user account']);
        $role_user = Role::create(['name' => 'user','description' => 'User Account']);
        # End ROLE Define :: # 


        # :: Begin permission for User :: #
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.show.all']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
        # :: End permission for User :: #


        # :: Begin permission for Role :: #
        Permission::create(['name' => 'roles.show']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);
        # :: End permission for User :: #

    }
}
