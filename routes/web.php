<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(
    ['prefix'=>'/admin',
    'namespace'=>'Admin',
    'middleware'=>['auth', 'admin']
    ], function(){

        Route::get('/', 'AdminController@index');
        // Route::get('/product', 'AdminController@getProductList');
        // Route::delete('/product/{id}', 'AdminController@destroy');
        // Route::get('/react', 'AdminController@reactAdmin');
        Route::get('/lang', 'AdminController@lang');
        Route::resource('/cake-fillings', 'CakeFillingController');
        Route::resource('/cake-side-decorations', 'CakeSideDecorationController');
        Route::resource('/cake-top-decorations', 'CakeTopDecorationController');
        Route::resource('/cake-additional-decorations', 'AdditionalDecorationController');
        Route::resource('/cake-additional-fillings', 'AdditionalFillerController');
        Route::resource('/orders', 'OrderController');
        Route::resource('/order-default-settings', 'DefaultSettingController');
        Route::resource('/cakes', 'CakeController');
        Route::resource('/statuses', 'StatusController');
        Route::resource('/products', 'ProductController');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/deliveries', 'DeliveryController');
        Route::resource('/cake-sizes', 'CakeSizeController');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/order', 'HomeController@OrderCake')->name('cake');
Route::post('/cake', 'Admin\CakeController@store');
Route::get('/cakes', 'HomeController@allCakes')->name('cakes');
Route::get('/products', 'HomeController@allProducts')->name('products');
Route::get('/products/{slug}', 'HomeController@singleProducts')->name('products.single');
Route::get('/category/{slug}', 'HomeController@singleCategory')->name('category.single');



Route::group(
    ['prefix'=>'/user',
    'middleware'=>['auth']
    ], function(){
        Route::get('/account', 'UserController@userAccount')->name('account');
        Route::get('/profile', 'UserController@userProfile')->name('profile');
        Route::post('/profile-update/{id}', 'UserController@updateInfo')->name('profile-update');
        Route::get('/orders', 'UserController@userOrders')->name('orders');
        Route::get('/change-settings', 'UserController@userChangeSettings')->name('change-settings');

});
Route::get('/cart', 'Admin\CartController@index');
Route::post('/cart/add', 'Admin\CartController@add');
Route::post('/cart/addCustom', 'Admin\CartController@addCustom');
Route::post('/cart/clear', 'Admin\CartController@clear');
Route::post('/cart/remove', 'Admin\CartController@remove');
Route::post('/cart/change', 'Admin\CartController@change');
Route::get('/checkout', 'Admin\OrderController@checkout')->name('checkout');


Route::post('/checkout', 'Admin\OrderController@confirmOrder');

// Route::group(
//     ['prefix'=>'/cart',
//     // 'middleware'=>['auth']
//     ], function(){
//         Route::post('/add', 'CartController@add')->name('cart.add');
//         Route::post('/clear', 'CartController@clear')->name('cart.clear');
// });


Route::get('/social-auth/{provider}', 'Auth\SocialController@redirectToProvider')->name('auth.social');

Route::get('/social-auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback')->name('auth.social.callback');
