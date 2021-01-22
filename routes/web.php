<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Usahas
    Route::delete('usahas/destroy', 'UsahaController@massDestroy')->name('usahas.massDestroy');
    Route::resource('usahas', 'UsahaController');
    Route::post('usahas/complete', 'UsahasController@storeComplete')->name('usahas.storeComplete');

    // Pengusahas
    Route::delete('pengusahas/destroy', 'PengusahaController@massDestroy')->name('pengusahas.massDestroy');
    Route::resource('pengusahas', 'PengusahaController');

    // Media Sosials
    Route::delete('media-sosials/destroy', 'MediaSosialController@massDestroy')->name('media-sosials.massDestroy');
    Route::resource('media-sosials', 'MediaSosialController');

    // Produk Unggulans
    Route::delete('produk-unggulans/destroy', 'ProdukUnggulanController@massDestroy')->name('produk-unggulans.massDestroy');
    Route::resource('produk-unggulans', 'ProdukUnggulanController');

    // Foto Produks
    Route::delete('foto-produks/destroy', 'FotoProdukController@massDestroy')->name('foto-produks.massDestroy');
    Route::post('foto-produks/media', 'FotoProdukController@storeMedia')->name('foto-produks.storeMedia');
    Route::post('foto-produks/ckmedia', 'FotoProdukController@storeCKEditorImages')->name('foto-produks.storeCKEditorImages');
    Route::resource('foto-produks', 'FotoProdukController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
