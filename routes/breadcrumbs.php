<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// ::Begin Currency ::
Breadcrumbs::for('currency', function ($trail) {
    $trail->push('Manage Currency Setting', route('currency.index'));
});
Breadcrumbs::for('currency.create', function ($trail) {
    $trail->parent('currency');
    $trail->push('Create', route('currency.create'));
});
Breadcrumbs::for('currency.edit', function ($trail,$currency) {
    $trail->parent('currency');
    $trail->push($currency->name);
    $trail->push('Edit', route('currency.edit',$currency));
});
// :: End Currency ::


// :: Begin Dashboard ::
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});
// :: End Dashboard ::

// :: Begin Role And Permission ::
Breadcrumbs::for('roles', function ($trail) {
    $trail->push('Roles', route('roles.index'));
});
Breadcrumbs::for('roles_create', function ($trail) {
    $trail->parent('roles');
    $trail->push('Create', route('roles.create'));
});
Breadcrumbs::for('roles_edit', function ($trail,$role) {
    $trail->parent('roles');
    $trail->push($role->name);
    $trail->push('Edit', route('roles.edit',$role));
});
// :: End Role And Permission ::

// :: Begin User Profile ::
Breadcrumbs::for('profile', function ($trail) {
    $trail->push('Profile Manager', route('profile.edit'));
});
// :: End User Profile ::

// Begin System Setting ::
Breadcrumbs::for('system.settion.manage', function ($trail,$systemSetting) {
    $trail->push('Manage System Setting', route('setting.system.manage',$systemSetting));
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
Breadcrumbs::for('units.edit', function ($trail,$productUnit) {
    $trail->parent('units.index');
    $trail->push($productUnit->name);
    $trail->push('Edit', route('units.edit',$productUnit));
});
// :: End Unit ::
