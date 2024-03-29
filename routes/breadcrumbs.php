<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// :: Begin Category ::
Breadcrumbs::for('category.index', function ($trail) {
    $trail->push('Category', route('category.index'));
});
Breadcrumbs::for('category.create', function ($trail) {
    $trail->parent('category.index');
    $trail->push('Create', route('category.create'));
});
Breadcrumbs::for('category.edit', function ($trail, $category) {
    $trail->parent('category.index');
    $trail->push($category->name);
    $trail->push('Edit', route('category.edit', $category));
});
// :: End Category ::

// ::Begin Currency ::
Breadcrumbs::for('currency', function ($trail) {
    $trail->push('Manage Currency Setting', route('currency.index'));
});
Breadcrumbs::for('currency.create', function ($trail) {
    $trail->parent('currency');
    $trail->push('Create', route('currency.create'));
});
Breadcrumbs::for('currency.edit', function ($trail, $currency) {
    $trail->parent('currency');
    $trail->push($currency->name);
    $trail->push('Edit', route('currency.edit', $currency));
});
// :: End Currency ::

// ::Begin Customer ::
Breadcrumbs::for('customer', function ($trail) {
    $trail->push('Customer', route('customer.index'));
});
Breadcrumbs::for('customer.create', function ($trail) {
    $trail->parent('customer');
    $trail->push('Create', route('customer.create'));
});
Breadcrumbs::for('customer.edit', function ($trail, $currency) {
    $trail->parent('customer');
    $trail->push($currency->name);
    $trail->push('Edit', route('customer.edit', $currency));
});
// :: End Customer ::


// :: Begin Dashboard ::
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});
// :: End Dashboard ::


// ::Begin Customer ::
Breadcrumbs::for('product', function ($trail) {
    $trail->push('Product', route('product.index'));
});
Breadcrumbs::for('product.create', function ($trail) {
    $trail->parent('product');
    $trail->push('Create', route('product.create'));
});
Breadcrumbs::for('product.edit', function ($trail, $product) {
    $trail->parent('product');
    $trail->push($product->name);
    $trail->push('Edit', route('product.edit', $product));
});
Breadcrumbs::for('product.import', function ($trail) {
    $trail->parent('product');
    $trail->push('Import', route('product.import'));
});
Breadcrumbs::for('product.barcode.generate', function ($trail,$product) {
    $trail->parent('product');
    $trail->push($product->name);
    $trail->push('Barcode', route('product.barcode.generate',$product));
});
// :: End Customer ::

// ::Begin Customer ::
Breadcrumbs::for('purchase', function ($trail) {
    $trail->push('Purchase', route('purchase.index'));
});
Breadcrumbs::for('purchase.create', function ($trail) {
    $trail->parent('purchase');
    $trail->push('Create', route('purchase.create'));
});
Breadcrumbs::for('purchase.edit', function ($trail, $purchase) {
    $trail->parent('purchase');
    $trail->push($purchase->name);
    $trail->push('Edit', route('purchase.edit', $purchase));
});
// :: End Customer ::



// :: Begin Role And Permission ::
Breadcrumbs::for('roles', function ($trail) {
    $trail->push('Roles', route('roles.index'));
});
Breadcrumbs::for('roles_create', function ($trail) {
    $trail->parent('roles');
    $trail->push('Create', route('roles.create'));
});
Breadcrumbs::for('roles_edit', function ($trail, $role) {
    $trail->parent('roles');
    $trail->push($role->name);
    $trail->push('Edit', route('roles.edit', $role));
});
// :: End Role And Permission ::

// :: Begin User Profile ::
Breadcrumbs::for('profile', function ($trail) {
    $trail->push('Profile Manager', route('profile.edit'));
});
// :: End User Profile ::


// ::Begin Supplier ::
Breadcrumbs::for('supplier', function ($trail) {
    $trail->push('Supplier', route('supplier.index'));
});
Breadcrumbs::for('supplier.create', function ($trail) {
    $trail->parent('supplier');
    $trail->push('Create', route('supplier.create'));
});
Breadcrumbs::for('supplier.edit', function ($trail, $currency) {
    $trail->parent('supplier');
    $trail->push($currency->name);
    $trail->push('Edit', route('supplier.edit', $currency));
});
// :: End Supplier ::


// Begin System Setting ::
Breadcrumbs::for('system.settion.manage', function ($trail, $systemSetting) {
    $trail->push('Manage System Setting', route('setting.system.manage', $systemSetting));
});
// End System Setting ::

// :: Begin Unit ::
Breadcrumbs::for('units.index', function ($trail) {
    $trail->push('Units', route('units.index'));
});
Breadcrumbs::for('units.create', function ($trail) {
    $trail->parent('units.index');
    $trail->push('Create', route('units.create'));
});
Breadcrumbs::for('units.edit', function ($trail, $productUnit) {
    $trail->parent('units.index');
    $trail->push($productUnit->name);
    $trail->push('Edit', route('units.edit', $productUnit));
});
// :: End Unit ::

// ::Begin Users ::
Breadcrumbs::for('users', function ($trail) {
    $trail->push('User', route('users.index'));
});
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users');
    $trail->push('Create', route('users.create'));
});
Breadcrumbs::for('users.edit', function ($trail, $user) {
    $trail->parent('users');
    $trail->push($user->name);
    $trail->push('Edit', route('users.edit', $user));
});
// :: End Supplier ::


// :: Begin Unit ::
Breadcrumbs::for('warehouse.index', function ($trail) {
    $trail->push('Warehouse', route('warehouse.index'));
});
Breadcrumbs::for('warehouse.create', function ($trail) {
    $trail->parent('warehouse.index');
    $trail->push('Create', route('warehouse.create'));
});
Breadcrumbs::for('warehouse.edit', function ($trail, $warehouse) {
    $trail->parent('warehouse.index');
    $trail->push($warehouse->name);
    $trail->push('Edit', route('warehouse.edit', $warehouse));
});
// :: End Unit ::
