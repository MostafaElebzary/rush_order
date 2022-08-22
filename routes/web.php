<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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


//Auth::routes();

Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Admin routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/home', 'HomeController@index')->name('admin.blank');
    // Route::get('/page', 'HomeController@page');

    Route::get('/admins', 'AdminController@index')->name('admins');
    Route::get('admins_datatable', 'AdminController@datatable')->name('admins.datatable.data');
    Route::get('delete-admin', 'AdminController@destroy');
    Route::get('show-admin/{id}', 'AdminController@show')->name('admins.show');
    Route::post('store-admin', 'AdminController@store');
    Route::get('edit-admin/{id}', 'AdminController@edit');
    Route::post('update-admin', 'AdminController@update');
    Route::get('add-admin-button', function () {
        return view('admin/admin/button');
    });

    Route::get('edit-setting', 'SettingController@edit');
    Route::post('update-setting', 'SettingController@update');

    Route::get('/pages', 'PageController@index');
    Route::get('pages_datatable', 'PageController@datatable')->name('pages.datatable.data');
    Route::get('delete-page', 'PageController@destroy');
    Route::get('show-page/{id}', 'PageController@show');
    Route::get('create-page', 'PageController@create');
    Route::post('store-page', 'PageController@store');
    Route::get('edit-page/{id}', 'PageController@edit');
    Route::post('update-page', 'PageController@update');
    Route::get('add-page-button', function () {
        return view('admin/page/button');
    });

    Route::get('/slider', 'SliderController@index');
    Route::get('slider_datatable', 'SliderController@datatable')->name('slider.datatable.data');
    Route::get('delete-slider', 'SliderController@destroy');
    Route::get('create-slider', 'SliderController@create');
    Route::post('store-slider', 'SliderController@store');
    Route::get('edit-slider/{id}', 'SliderController@edit');
    Route::post('update-slider', 'SliderController@update');
    Route::get('add-slider-button', function () {
        return view('admin/slider/button');
    });

    Route::get('/partner', 'PartnerController@index');
    Route::get('partner_datatable', 'PartnerController@datatable')->name('partner.datatable.data');
    Route::get('delete-partner', 'PartnerController@destroy');
    Route::get('create-partner', 'PartnerController@create');
    Route::post('store-partner', 'PartnerController@store');
    Route::get('edit-partner/{id}', 'PartnerController@edit');
    Route::post('update-partner', 'PartnerController@update');
    Route::get('add-partner-button', function () {
        return view('admin/partner/button');
    });

//start categories
    Route::get('/category', 'CategoryController@index');
    Route::get('category_datatable', 'CategoryController@datatable')->name('category.datatable.data');
    Route::get('delete-category', 'CategoryController@destroy');
    Route::get('show-category/{id}', 'CategoryController@show');
    Route::get('create-category', 'CategoryController@create');
    Route::post('store-category', 'CategoryController@store');
    Route::get('edit-category/{id}', 'CategoryController@edit');
    Route::post('update-category', 'CategoryController@update');
    Route::get('add-category-button', function () {
        return view('admin/category/button');
    });

    //start categories
    Route::get('/contact', 'ContactController@index');
    Route::get('contact_datatable', 'ContactController@datatable')->name('contact.datatable.data');
    Route::get('delete-contact', 'ContactController@destroy');
    Route::get('show-contact/{id}', 'ContactController@show');
    Route::get('create-contact', 'ContactController@create');
    Route::post('store-contact', 'ContactController@store');
    Route::get('edit-contact/{id}', 'ContactController@edit');
    Route::post('update-contact', 'ContactController@update');
    Route::get('add-contact-button', function () {
        return view('admin/contact/button');
    });

//start offers
    Route::get('/offer', 'OfferController@index');
    Route::get('offer_datatable', 'OfferController@datatable')->name('offer.datatable.data');
    Route::get('delete-offer', 'OfferController@destroy');
    Route::get('show-offer/{id}', 'OfferController@show');
    Route::get('create-offer', 'OfferController@create');
    Route::post('store-offer', 'OfferController@store');
    Route::get('edit-offer/{id}', 'OfferController@edit');
    Route::post('update-offer', 'OfferController@update');
    Route::get('add-offer-button', function () {
        return view('admin/offer/button');
    });


//    start posts
    Route::get('/post', 'PostController@index');
    Route::get('post_datatable', 'PostController@datatable')->name('post.datatable.data');
    Route::get('delete-post', 'PostController@destroy');
    Route::get('show-post/{id}', 'PostController@show');
    Route::get('create-post', 'PostController@create');
    Route::post('store-post', 'PostController@store');
    Route::get('edit-post/{id}', 'PostController@edit');
    Route::post('update-post', 'PostController@update');
    Route::get('add-post-button', function () {
        return view('admin/post/button');
    });

//    start posts images
    Route::get('/post-image/{post_id}', 'PostImagesController@index');
    Route::get('post_image_datatable/{post_id}', 'PostImagesController@datatable')->name('image.post.datatable.data');
    Route::get('delete-post-image', 'PostImagesController@destroy');
    Route::get('create-post-image/{post_id}', 'PostImagesController@create');
    Route::post('store-post-image', 'PostImagesController@store');
    Route::get('add-post-image-button/{id}', 'PostImagesController@button');


    Route::get('/client', 'ClientController@index');
    Route::get('client_datatable', 'ClientController@datatable')->name('client.datatable.data');
    Route::get('delete-client', 'ClientController@destroy');
    Route::get('show-client/{id}', 'ClientController@show');
    Route::get('create-client', 'ClientController@create');
    Route::post('store-client', 'ClientController@store');
    Route::get('edit-client/{id}', 'ClientController@edit');
    Route::post('update-client', 'ClientController@update');
    Route::get('add-client-button', function () {
        return view('admin/client/button');
    });

    Route::get('follower_datatable/{parent_id}', 'ClientController@datatable_followers')->name('follower.datatable.data');


    Route::get('client_card_datatable/{parent_id}', 'ClientCardsController@datatable')->name('client.cards.datatable.data');
    Route::get('delete-client-card', 'ClientCardsController@destroy');
    Route::post('store-client-card', 'ClientCardsController@store');
    Route::get('edit-client-card/{id}', 'ClientCardsController@edit');
    Route::post('update-client-card', 'ClientCardsController@update');
    Route::get('add-client-card-button/{parent_id}', 'ClientCardsController@button');


//debts
    Route::get('client_debts_datatable/{parent_id}', 'ClientDebtsController@datatable')->name('client.debts.datatable.data');
    Route::get('delete-client-debts', 'ClientDebtsController@destroy');
    Route::post('store-client-debts', 'ClientDebtsController@store');
    Route::get('edit-client-debts/{id}', 'ClientDebtsController@edit');
    Route::post('update-client-debts', 'ClientDebtsController@update');
    Route::get('add-client-debts-button/{parent_id}', 'ClientDebtsController@button');


//payment
    Route::get('client_payment_datatable/{parent_id}', 'ClientPaymentController@datatable')->name('client.payment.datatable.data');
    Route::get('delete-client-payment', 'ClientPaymentController@destroy');
    Route::post('store-client-payment', 'ClientPaymentController@store');
    Route::get('edit-client-payment/{id}', 'ClientPaymentController@edit');
    Route::post('update-client-payment', 'ClientPaymentController@update');
    Route::get('add-client-payment-button/{parent_id}', 'ClientPaymentController@button');


//notification
    Route::get('client_notification_datatable/{parent_id}', 'ClientNotificationController@datatable')->name('client.notification.datatable.data');
    Route::get('delete-client-notification', 'ClientNotificationController@destroy');
    Route::post('store-client-notification', 'ClientNotificationController@store');
    Route::get('edit-client-notification/{id}', 'ClientNotificationController@edit');
    Route::post('update-client-notification', 'ClientNotificationController@update');
    Route::get('add-client-notification-button/{parent_id}', 'ClientNotificationController@button');

});


Route::get('lang/{lang}', function ($lang) {


    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'en') {
        session()->put('lang', 'en');

    } else {
        session()->put('lang', 'ar');
    }


    return back();
});
