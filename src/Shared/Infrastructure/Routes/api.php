<?php

use Illuminate\Support\Facades\Route;
use Src\BoundedContext\Backend\Infrastructure\Controllers\Product\ProductController;
use Src\BoundedContext\Backend\Infrastructure\Controllers\ProductFamily\ProductFamilyController;
use Src\BoundedContext\Backend\Infrastructure\Controllers\Role\RoleController;
use Src\BoundedContext\Backend\Infrastructure\Controllers\Tenant\TenantController;
use Src\BoundedContext\Backend\Infrastructure\Controllers\User\UserController;

Route::group(['prefix' => config('setting.api'), 'as' => 'api.'], function () {

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'throttle:60,1']], function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('users', UserController::class);
        Route::apiResource('product-families', ProductFamilyController::class);
        Route::apiResource('tenants', TenantController::class);
        Route::group(['as' => 'tenants.','prefix' => '{tenantId}'], function () {
            Route::apiResource('products', ProductController::class);
        });
    });

    Route::group(['prefix' => '{business}', 'middleware' => ['auth:business', 'throttle:60,1']], function () {
        Route::get('health-check', function() {
            return response()->json(['status' => 'success'], 200);
        });
    });
});
