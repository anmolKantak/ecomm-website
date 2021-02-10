<?php

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
Route::get('/ecomm','IndexController@index');


Route::get('/admin', function () {
    return view('admin');
});
Route::get('/xyz', function () {
    return view('testhome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout');



Route::resource('pages/pages', 'Pages\PagesController');
Route::get('/page','Pages\PagesController@mainPage');

Route::resource('pages/banner/banners', 'Banner\BannersController');
Route::resource('banner/banners', 'Banner\BannersController');
Route::resource('banner/banner/banners', 'Banner\BannersController');

Route::match(['get','post'],'/view_banners','Banner\BannersController@index');
Route::match(['get','post'],'/create_banner','Banner\BannersController@create');

Route::resource('category/categories', 'Category\CategoriesController');

Route::resource('category/category/categories/create', 'Category\CategoriesController');
Route::resource('pages/category/categories', 'Banner\BannersController');
Route::resource('pages/category/categories/create', 'Banner\BannersController');


//Products route
Route::match(['get','post'],'/pages/pages/add_products','ProductsController@addProduct');
Route::match(['get','post'],'/add_products','ProductsController@addProduct');

//Coupons route
Route::match(['get','post'],'/coupons','CouponsController@addCoupon');
Route::match(['get','post'],'/edit_coupon/{id}','CouponsController@editCoupon');
Route::match(['get','post'],'/coupon',function(){
        return view('coupons/add_coupon');
});
Route::get('/c','CouponsController@viewCoupons');
Route::get('/delete_coupon/{id}','CouponsController@deleteCoupon');

//User-login route
Route::match(['get','post'],'/user-register','UsersController@register');
Route::match(['get','post'],'/user-login','UsersController@login');
Route::match(['get','post'],'/forgot-password','UsersController@forgotPassword');

// socialite
Route::get('login/{social}','Auth\LoginController@socialLogin')->where('social','facebook|google|twitter');
Route::get('login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','facebook|google|twitter');

//checkout
Route::match(['get','post'],'/checkout','ProductsController@checkout');
//add-cart
//Route::match(['get','post'],'/add-cart','ProductsController@addtocart');
//shopping-cart routes
Route::get('/cart','CartController@getCart')->name('checkout.cart');
Route::get('/cart/item/{id}/remove','CartController@removeItem')->name('checkout.cart.remove');
Route::get('/cart/clear','CartController@clearCart')->name('checkout.cart.clear');


