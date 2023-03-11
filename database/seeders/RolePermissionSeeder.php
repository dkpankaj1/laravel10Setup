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
        $role_super_admin = Role::create(['name' => 'super_admin']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);
        # End ROLE Define :: # 


        # :: Begin permission for User :: #
        Permission::create(['name' => 'users_show']);
        Permission::create(['name' => 'users_create']);
        Permission::create(['name' => 'users_edit']);
        Permission::create(['name' => 'users_delete']);
        # :: End permission for User :: #


        # :: Begin permission for Role :: #
        Permission::create(['name' => 'roles_show']);
        Permission::create(['name' => 'roles_create']);
        Permission::create(['name' => 'roles_edit']);
        Permission::create(['name' => 'roles_delete']);
        # :: End permission for User :: #

    }
}
