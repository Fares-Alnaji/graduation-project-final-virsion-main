<?php

use App\Http\Controllers\Authorization\PermissionController;
use App\Http\Controllers\Authorization\RoleController;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\Auth\AuthController;
use App\Http\Controllers\dashboard\BlogController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\CouponController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\SliderController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [

        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::group(
            [
                'middleware' => 'guest:admin',
                'as' => 'auth.',
                'prefix' => 'dashboard',
            ],
            function () {
                Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
                Route::post('/login', [AuthController::class, 'login']);
            }
        );
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::group([
            'prefix' => 'dashboard',
            'middleware' => 'auth:admin'
        ], function () {
            Route::view('/', 'dashboard.index')->name('dashboard.index');
            Route::get('/', [DashboardController::class, 'index']);
            Route::resource('/admins', AdminController::class);
            Route::resource('/users', UserController::class);

            /////////////////////////////////** Categories Mangemnet*//////////////////////////

            Route::get('categories/trash', [CategoryController::class, 'trash'])
                ->name('categories.trash');
            Route::put('/categories/{id}/restore', [CategoryController::class, 'restore'])
                ->name('categories.restore');
            Route::delete('/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])
                ->name('categories.force-delete');
            Route::resource('/categories', CategoryController::class);

            /////////////////////////////////** products Mangemnet*//////////////////////////
            Route::get('products/trash', [ProductController::class, 'trash'])
                ->name('products.trash');
            Route::put('/products/{id}/restore', [ProductController::class, 'restore'])
                ->name('products.restore');
            Route::delete('/products/{id?}/force-delete', [ProductController::class, 'forceDelete'])
                ->name('products.force-delete');
            Route::resource('/products', ProductController::class);


            /////////////////////////////////** SLider Mangemnet*///////////////////////////


            Route::resource('sliders', SliderController::class);

            /////////////////////////////////** Coupon Mangemnet*///////////////////////////

            Route::resource('coupons', CouponController::class);

            /////////////////////////////////** Blog Mangemnet*///////////////////////////

            Route::resource('blogs', BlogController::class);

            Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
        });


        /* ---------------- Roles & Permission ---------------*/
        Route::prefix('dashboard')->middleware(['auth:admin'])->group(function () {
            Route::resource('roles', RoleController::class);
            Route::resource('permissions', PermissionController::class);

            Route::get('roles/{role}/permissions', [RoleController::class, 'editRolePermissions'])->name('role.edit-permissions');
            Route::put('roles/{role}/permissions', [RoleController::class, 'updateRolePermissions']);
        });
    }
);
