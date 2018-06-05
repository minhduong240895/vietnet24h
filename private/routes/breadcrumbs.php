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
    $breadcrumbs->push('Tạo mới', route('users.create'));
});

Breadcrumbs::register('users-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Sửa', route('users.edit', ['id' => $data->id]));
});

Breadcrumbs::register('users-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Xem chi tiết', route('users.show', ['id' => $data->id]));
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

//-----------------------------------Comments---------------------------------------
Breadcrumbs::register('comments', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Bình luận', route('comments.index'));
});

Breadcrumbs::register('comments-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('comments');
    $breadcrumbs->push('Edit', route('comments.edit', ['id' => $data->id]));
});
Breadcrumbs::register('comments-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('comments');
    $breadcrumbs->push('Show', route('comments.show', ['id' => $data->id]));
});

//------------------------------------types--------------------------------
Breadcrumbs::register('types', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Loại bài viết', route('types.index'));
});

Breadcrumbs::register('types-create', function ($breadcrumbs) {
    $breadcrumbs->parent('types');
    $breadcrumbs->push('Tạo mới', route('types.create'));
});

Breadcrumbs::register('types-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('types');
    $breadcrumbs->push('Sửa', route('types.edit', ['id' => $data->id]));
});
Breadcrumbs::register('types-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('types');
    $breadcrumbs->push('Xem chi tiết', route('types.show', ['id' => $data->id]));
});

//------------------------------------Categories--------------------------------
Breadcrumbs::register('categories', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Danh mục', route('categories.index'));
});

Breadcrumbs::register('categories-create', function ($breadcrumbs) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push('Tạo mới', route('categories.create'));
});

Breadcrumbs::register('categories-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push('Sửa', route('categories.edit', ['id' => $data->id]));
});
Breadcrumbs::register('categories-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push('Xem chi tiết', route('categories.show', ['id' => $data->id]));
});

//------------------------------------types--------------------------------
Breadcrumbs::register('topics', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Danh mục con', route('topics.index'));
});

Breadcrumbs::register('topics-create', function ($breadcrumbs) {
    $breadcrumbs->parent('topics');
    $breadcrumbs->push('Tạo mới', route('topics.create'));
});

Breadcrumbs::register('topics-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('topics');
    $breadcrumbs->push('Sửa', route('topics.edit', ['id' => $data->id]));
});
Breadcrumbs::register('topics-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('topics');
    $breadcrumbs->push('Xem chi tiết', route('topics.show', ['id' => $data->id]));
});


//------------------------------------options--------------------------------
Breadcrumbs::register('options', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Thành phần', route('options.index'));
});

Breadcrumbs::register('options-create', function ($breadcrumbs) {
    $breadcrumbs->parent('options');
    $breadcrumbs->push('Tạo mới', route('options.create'));
});

Breadcrumbs::register('options-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('options');
    $breadcrumbs->push('Sửa', route('options.edit', ['id' => $data->id]));
});
Breadcrumbs::register('options-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('options');
    $breadcrumbs->push('Xem chi tiết', route('options.show', ['id' => $data->id]));
});


//------------------------------------banners--------------------------------
Breadcrumbs::register('banners', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Ảnh quảng cáo', route('banners.index'));
});

Breadcrumbs::register('banners-create', function ($breadcrumbs) {
    $breadcrumbs->parent('options');
    $breadcrumbs->push('Tạo mới', route('banners.create'));
});

Breadcrumbs::register('banners-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('options');
    $breadcrumbs->push('Sửa', route('banners.edit', ['id' => $data->id]));
});
Breadcrumbs::register('banners-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('options');
    $breadcrumbs->push('Xem chi tiết', route('banners.show', ['id' => $data->id]));
});


//------------------------------------Tags--------------------------------
Breadcrumbs::register('tags', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Tags', route('tags.index'));
});

Breadcrumbs::register('tags-create', function ($breadcrumbs) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('Tạo mới', route('tags.create'));
});

Breadcrumbs::register('tags-edit', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('Sửa', route('tags.edit', ['id' => $data->id]));
});
Breadcrumbs::register('tags-show', function ($breadcrumbs, $data) {
    $breadcrumbs->parent('tags');
    $breadcrumbs->push('Xem chi tiết', route('tags.show', ['id' => $data->id]));
});


//------------------------------------types--------------------------------
Breadcrumbs::register('statistic-topic', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Thống kê theo danh mục', route('statistic.listtopic'));
});
Breadcrumbs::register('statistic-user', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Thống kê theo danh mục', route('statistic.topic'));
});


