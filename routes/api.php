<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Usahas
    Route::apiResource('usahas', 'UsahaApiController');

    // Pengusahas
    Route::apiResource('pengusahas', 'PengusahaApiController');

    // Media Sosials
    Route::apiResource('media-sosials', 'MediaSosialApiController');

    // Produk Unggulans
    Route::apiResource('produk-unggulans', 'ProdukUnggulanApiController');

    // Foto Produks
    Route::post('foto-produks/media', 'FotoProdukApiController@storeMedia')->name('foto-produks.storeMedia');
    Route::apiResource('foto-produks', 'FotoProdukApiController');
});
