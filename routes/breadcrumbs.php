<?php
/**
 * Created by PhpStorm.
 * User: HieuTQ
 * Date: 3/17/2018
 * Time: 4:44 PM
 */

Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('homes.index'));
});


Breadcrumbs::register('users', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('User', route('users.index'));
});

Breadcrumbs::register('users-create', function ($breadcrumbs) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Create new', route('users.create'));
});

Breadcrumbs::register('users-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Edit', route('users.edit', ['id' => $data->id]));
});

Breadcrumbs::register('users-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Show', route('users.show', ['id' => $data->id]));
});
//--------------------------groups------------------------
Breadcrumbs::register('groups', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Groups', route('groups.index'));
});

Breadcrumbs::register('groups-create', function ($breadcrumbs) {
    $breadcrumbs->parent('groups');
    $breadcrumbs->push('Create new', route('groups.create'));
});

//-----------------------------------news---------------------------------------
Breadcrumbs::register('news', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('News', route('news.index'));
});

Breadcrumbs::register('news-create', function ($breadcrumbs) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('Create new', route('news.create'));
});

Breadcrumbs::register('news-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('Edit', route('news.edit', ['id' => $data->id]));
});
Breadcrumbs::register('news-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('news');
    $breadcrumbs->push('Show', route('news.show', ['id' => $data->id]));
});

//------------------------------------notifications--------------------------------
Breadcrumbs::register('notifications', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Notifications', route('notifications.index'));
});

Breadcrumbs::register('notifications-create', function ($breadcrumbs) {
    $breadcrumbs->parent('notifications');
    $breadcrumbs->push('Create new', route('notifications.create'));
});

Breadcrumbs::register('notifications-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('notifications');
    $breadcrumbs->push('Edit', route('notifications.edit', ['id' => $data->id]));
});
Breadcrumbs::register('notifications-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('notifications');
    $breadcrumbs->push('Show', route('notifications.show', ['id' => $data->id]));
});
