<?php

use App\Http\Controllers\Api\ActivitiesCatogeryController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\EmailVerificationController;
use App\Http\Controllers\Api\Auth\ResetPasswordController;
use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CartItemController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\SettingPageController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\SubscriptionController;
use App\Http\Controllers\Api\UserAddressController;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'ChangeLanguage'], function ()
{
Route::post('verification-notification', [EmailVerificationController::class, 'sendEmailverfyc'])->name('verification-notification');
Route::post('verify-email', [EmailVerificationController::class, 'verifyEmail'])->name('verify-email');
Route::post('verify-code', [EmailVerificationController::class, 'verifyCode'])->name('verify-code');


Route::post('forgot-password', [ResetPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'resetPassword'])->middleware('sanctum');


Route::post('/contact', [ContactUsController::class, 'store']);
Route::controller(AuthController::class)->group(function ()
{
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('sanctum');
    Route::post('/register', 'register');
});
Route::get('getOtpForUser', [UserController::class, 'getOtpForUser']);


Route::group(['middleware' => 'sanctum'], function ()
{
    Route::post('/subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions/store');
    Route::get('/subscriptions/user', [SubscriptionController::class, 'show'])->name('subscriptions/user');
    Route::controller(OrderController::class)->group(function ()
    {
        Route::get('/orders', 'userOrder');
        Route::get('/orders/detalis/{id}', 'orderDetalis');
        Route::get('/orders/create', 'saveOrder');
        Route::post('/orders/cancel', 'cancelOrder');
    });
    Route::controller(UserController::class)->group(function ()
    {
        Route::get('userInformation', 'getUserInfo');
        Route::post('updateUserInfo', 'updateUserInfo');
        Route::post('changePassword', 'changePassword');
    });


    Route::controller(UserAddressController::class)->group(function ()
    {
        Route::get('/user-addresses', 'index');
        Route::get('/user-addresses/{userAddress}', 'show');
        Route::post('/user-addresses/store', 'store');
        Route::put('/user-addresses/update', 'update');
        Route::delete('/user-addresses/destroy/{id}', 'destroy');
    });
});

    Route::get('/categories', [CategoryController::class, 'getCatogery'])->name('categories')->middleware('ChangeLanguage');
    Route::get('/activitiesCatogeries', [ActivitiesCatogeryController::class, 'index'])->name('activitiesCatogeries')->middleware('ChangeLanguage');
    Route::get('categories/{categoryId}/subcategories', [SubCategoryController::class, 'getSubcategories'])->middleware('ChangeLanguage');


    Route::controller(ProductController::class)->group(function ()
    {
    Route::get('/products',  'getProducts')->name('products.getProducts');
    Route::get('/categories/{subCatogeryId}/products', 'getProductsBysubCatogery')->name('products.getProductsBysubCatogery');
    Route::get('/product/{productId}', 'getProductById')->name('product.getProductById');
    Route::post('/search-product',  'searchProduct')->name('search-product');
    Route::post('updateviews/{id}', 'updateViews')->name('updateviews');
    });
    Route::controller(ActivityController::class)->group(function ()
    {
    Route::get('/activities',  'getActivity')->name('activities.getProducts');
    Route::get('/activities_catogeries/{subCatogeryId}/activities', 'getactivitiesBysubActivitiesCatogery')->name('activities.getactivitiesBysubActivitiesCatogery');
    Route::get('/activities/{productId}', 'getActivityById')->name('product.activities');
    // Route::post('/search-product',  'searchProduct')->name('search-product');
    // Route::post('updateviews/{id}', 'updateViews')->name('updateviews');
    });
    Route::controller(SettingPageController::class)->group(function ()
    {
        // terms Page
        Route::get('terms', 'termsPage');

        // About Page
        Route::get('about', 'aboutPage');

        // Privacy Page
        Route::get('privacy', 'privacyPage');

        // Return Policy Page
        Route::get('return-policy', 'returnPolicyPage');

        // Store Policy Page
        Route::get('store-policy', 'storePolicyPage');

        // Seller Policy Page
        Route::get('seller-policy', 'sellerPolicyPage');

        // Primary Color
        Route::get('primary-color', 'primeryColor');
        Route::post('sendOtp', 'sendOtp')->name('sendOtp');
    });



Route::group(['middleware' => 'sanctum'], function ()
{
    Route::controller(CartItemController::class)->group(function ()
    {
        Route::post('/cart/add', 'addToCart')->name('cart.addToCart');
        Route::post('/cart/reduce', 'reduceQuantity')->name('cart.reduce');
        Route::post('/cart/applycoupon', 'applyCoupon')->name('cart.applyCoupon');
        Route::delete('/cart/remove', 'removeFromCart')->name('cart.removeFromCart');
        Route::get('/cart/items', 'getCartItems')->name('cart.getCartItems');
        Route::delete('/cart/clear', 'clear');
        Route::get('/cart/checkout', 'checkOut');
    });
});
    Route::controller(SettingController::class)->group(function ()
    {
        Route::get('/settings', 'index')->name('setting.index');
        Route::get('/settings/shop/{id}', 'shopDetalis')->name('setting.shop');
    });


Route::get('/countries', CountryController::class)->name('countries');
Route::get('/banners', BannerController::class)->name('banners');
});