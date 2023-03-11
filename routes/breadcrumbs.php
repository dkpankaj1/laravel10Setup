<?php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
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
