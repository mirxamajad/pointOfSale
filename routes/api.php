<?php

use Facade\FlareClient\Api;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');
    // Roles
    Route::apiResource('roles', 'RolesApiController');
    // Users
    Route::apiResource('users', 'UsersApiController');
    // Category
    Route::apiResource('category', 'CategoryController');

});
