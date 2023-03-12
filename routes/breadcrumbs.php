<?php

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
    $trail->push('Profile', route('profile.edit'));
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
