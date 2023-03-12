<?php


// Currency
Breadcrumbs::for('currency', function ($trail) {
    $trail->push('Manage Currency Setting', route('currency.index'));
});

// Currency > create
Breadcrumbs::for('currency.create', function ($trail) {
    $trail->parent('currency');
    $trail->push('Create', route('currency.create'));
});

// Currency > edit
Breadcrumbs::for('currency.edit', function ($trail,$currency) {
    $trail->parent('currency');
    $trail->push($currency->name);
    $trail->push('Edit', route('currency.edit'.$currency));
});


// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Role And Permission
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



// User Profile
Breadcrumbs::for('profile', function ($trail) {
    $trail->push('Profile Manager', route('profile.edit'));
});

// // Home > About
// Breadcrumbs::for('about', function ($trail) {
//     $trail->parent('home');
//     $trail->push('About', route('about'));
// });

// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('blog');
//     $trail->push($post->title, route('post', $post));
// });
