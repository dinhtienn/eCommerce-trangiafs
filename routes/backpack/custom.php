<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('company', 'CompanyCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('image', 'ImageCrudController');
    CRUD::resource('slide', 'SlideCrudController');
    CRUD::resource('social', 'SocialCrudController');
    CRUD::resource('category_image', 'CategoryImageCrudController');
    CRUD::resource('message', 'MessageCrudController');
    CRUD::resource('top_product', 'TopProductCrudController');
    Route::get('/api/top_products', 'TopProductCrudController@getProducts')->name('admin.search.products');
}); // this should be the absolute last line of this file