<?php

use App\Http\Controllers\front\Auth\userAuthController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\PaymentController;
use App\Http\Controllers\front\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
    [
        'as' => 'auth.',
        'prefix' => 'front'
    ],
    function () {
Route::get('/userRegister' ,[userAuthController::class, 'showRegister'])->name('userRegister');
Route::post('/userRegister' ,[userAuthController::class, 'register']);
Route::get('/userLogin' ,[userAuthController::class, 'showLogin'])->name('userLogin');
Route::post('/userLogin' ,[userAuthController::class, 'login']);
    }
);

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/blog', [HomeController::class , 'blog'])->name("blog");
Route::view('/about','front.about')->name("about");
Route::view('/shop','front.shop')->name('shop');
Route::get('cart', [CartController::class , 'index'])->name('Cart');
Route::get('/products/{product}',[ProductController::class,'show'])->name('single_product');

Route::view('/checkout','front.checkout')->name('checkout');
Route::get('/contact-us',[HomeController::class,'contact'])->name("contact");

Route::delete('/cart/delete/{id}', [CartController::class,'delete'])->name('cart.delete');
Route::delete('/cart/delete/{id}', [CartController::class,'delete'])->name('cart.delete');
Route::get('add-to-cart/{id}' , [CartController::class , 'addToCart'])->name('add-to-cart');
Route::get('/cart' , [CartController::class , 'showCart'])->name('cart');
Route::get('decrease-cart-item-qty/{id}' , [CartController::class , 'decreaseQty'])->name('decreaseQty');
Route::view('/single-product','front.single-product');
Route::get('/shop',[HomeController::class,'ShowAllPorducts'])->name('shop');


Route::get('userlogout', [userAuthController::class, 'logout'])->name('auth.userLogout');

Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');


require __DIR__ . '/dashboard.php';
