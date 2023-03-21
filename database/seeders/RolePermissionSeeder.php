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
        $role_super_admin = Role::create(['name' => 'super admin', 'description' => 'Super user account']);
        $role_admin = Role::create(['name' => 'admin', 'description' => 'Admin user account']);
        $role_user = Role::create(['name' => 'user', 'description' => 'User Account']);
        # End ROLE Define :: # 

        # :: Begin permission for category :: #
        Permission::create(['name' => 'category.show']);
        Permission::create(['name' => 'category.create']);
        Permission::create(['name' => 'category.edit']);
        Permission::create(['name' => 'category.delete']);
        # :: End permission for category :: #

        # :: Begin permission for currency :: #
        Permission::create(['name' => 'currency.show']);
        Permission::create(['name' => 'currency.create']);
        Permission::create(['name' => 'currency.edit']);
        Permission::create(['name' => 'currency.delete']);
        # :: End permission for currency :: #

        # :: Begin permission for customer :: #
        Permission::create(['name' => 'customer.show']);
        Permission::create(['name' => 'customer.create']);
        Permission::create(['name' => 'customer.edit']);
        Permission::create(['name' => 'customer.delete']);
        # :: End permission for customer :: #

        # :: Begin permission for product :: #
        Permission::create(['name' => 'product.show']);
        Permission::create(['name' => 'product.create']);
        Permission::create(['name' => 'product.edit']);
        Permission::create(['name' => 'product.delete']);
        Permission::create(['name' => 'product.import']);
        Permission::create(['name' => 'product.barcode.generate']);
        # :: End permission for product :: #

        # :: Begin permission for Role :: #
        Permission::create(['name' => 'roles.show']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);
        # :: End permission for Role :: #

        # :: Begin permission for system.settion :: #
        Permission::create(['name' => 'system.settion.show']);
        Permission::create(['name' => 'system.settion.edit']);
        # :: End permission for system.settion :: #

        # :: Begin permission for Supplier :: #
        Permission::create(['name' => 'supplier.show']);
        Permission::create(['name' => 'supplier.create']);
        Permission::create(['name' => 'supplier.edit']);
        Permission::create(['name' => 'supplier.delete']);
        # :: End permission for Supplier :: #

        # :: Begin permission for Unit :: #
        Permission::create(['name' => 'unit.show']);
        Permission::create(['name' => 'unit.create']);
        Permission::create(['name' => 'unit.edit']);
        Permission::create(['name' => 'unit.delete']);
        # :: End permission for Unit :: #

        # :: Begin permission for User :: #
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.show.all']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
        # :: End permission for User :: #


        # :: Begin permission for Warehouse :: #
        Permission::create(['name' => 'warehouse.show']);
        Permission::create(['name' => 'warehouse.create']);
        Permission::create(['name' => 'warehouse.edit']);
        Permission::create(['name' => 'warehouse.delete']);
        # :: End permission for Warehouse :: #



    }
}
