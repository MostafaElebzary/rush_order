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

//categories
    Route::get('/category/{parent_id?}', 'CategoryController@index')->name('category');
    Route::get('category_datatable/{parent_id?}', 'CategoryController@datatable')->name('category.datatable.data');
    Route::get('delete-category', 'CategoryController@destroy');
    Route::post('store-category', 'CategoryController@store');
    Route::get('edit-category/{id}', 'CategoryController@edit');
    Route::post('update-category', 'CategoryController@update');
    Route::get('add-category-button', function () {
        return view('admin/category/button');
    });

    Route::get('/sub-category/{parent_id}', 'CategoryController@index')->name('subcategory');


    Route::get('/user', 'UserController@index')->name('users');
    Route::get('user_datatable', 'UserController@datatable')->name('users.datatable.data');
    Route::get('delete-user', 'UserController@destroy');
    Route::get('show-user/{id}', 'UserController@show')->name('users.show');
    Route::post('store-user', 'UserController@store');
    Route::get('edit-user/{id}', 'UserController@edit');
    Route::post('update-user', 'UserController@update');
    Route::get('add-user-button', function () {
        return view('admin/user/button');
    });

    Route::get('/copoun', 'CopounController@index')->name('copouns');
    Route::get('copoun_datatable', 'CopounController@datatable')->name('copouns.datatable.data');
    Route::get('delete-copoun', 'CopounController@destroy');
    Route::get('show-copoun/{id}', 'CopounController@show')->name('copouns.show');
    Route::post('store-copoun', 'CopounController@store');
    Route::get('edit-copoun/{id}', 'CopounController@edit');
    Route::post('update-copoun', 'CopounController@update');
    Route::get('add-copoun-button', function () {
        return view('admin/copoun/button');
    });

    Route::get('/wallet', 'WalletController@index')->name('wallet');
    Route::get('wallet_datatable', 'WalletController@datatable')->name('wallet.datatable.data');
    Route::get('delete-wallet', 'WalletController@destroy');
    Route::post('store-wallet', 'WalletController@store');
    Route::get('edit-wallet/{id}', 'WalletController@edit');
    Route::post('update-wallet', 'WalletController@update');
    Route::get('add-wallet-button', function () {
        return view('admin/wallet/button');
    });

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::get('settings_datatable', 'SettingsController@datatable')->name('settings.datatable.data');
    Route::get('delete-settings', 'SettingsController@destroy');
    Route::post('store-settings', 'SettingsController@store');
    Route::get('edit-settings/{id}', 'SettingsController@edit');
    Route::post('update-settings', 'SettingsController@update');
    Route::get('add-settings-button', function () {
        return view('admin/settings/button');
    });


    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::get('contact_datatable', 'ContactController@datatable')->name('contact.datatable.data');
    Route::get('delete-contact', 'ContactController@destroy');
    Route::get('show-contact/{id}', 'ContactController@show')->name('contact.show');
    Route::post('store-contact', 'ContactController@store');
    Route::get('edit-contact/{id}', 'ContactController@edit');
    Route::post('update-contact', 'ContactController@update');
    Route::get('add-contact-button', function () {
        return view('admin/contact/button');
    });


    Route::get('/company', 'CompanyController@index')->name('company');
    Route::get('company_datatable', 'CompanyController@datatable')->name('company.datatable.data');
    Route::get('delete-company', 'CompanyController@destroy');
    Route::get('show-company/{id}', 'CompanyController@show');
    Route::get('create-company', 'CompanyController@create');
    Route::post('store-company', 'CompanyController@store');
    Route::get('edit-company/{id}', 'CompanyController@edit');
    Route::post('update-company', 'CompanyController@update');
    Route::get('add-company-button', function () {
        return view('admin/company/button');
    });


//company branches
    Route::get('branch_datatable/{company_id}', 'BranchController@datatable')->name('branch.datatable.data');
    Route::get('delete-branch', 'BranchController@destroy');
    Route::get('show-branch/{id}', 'BranchController@show');
    Route::get('create-branch', 'BranchController@create');
    Route::post('store-branch', 'BranchController@store');
    Route::get('edit-branch/{id}', 'BranchController@edit');
    Route::post('update-branch', 'BranchController@update');
    Route::get('add-branch-button/{company_id}', 'BranchController@button');

//    company Categories
    Route::get('company_category_datatable/{company_id}', 'CompanyCategoryController@datatable')->name('company_category.datatable.data');
    Route::get('delete-company_category', 'CompanyCategoryController@destroy');
    Route::get('show-company_category/{id}', 'CompanyCategoryController@show');
    Route::get('create-company_category', 'CompanyCategoryController@create');
    Route::post('store-company_category', 'CompanyCategoryController@store');
    Route::get('edit-company_category/{id}', 'CompanyCategoryController@edit');
    Route::post('update-company_category', 'CompanyCategoryController@update');
    Route::get('add-company_category-button/{company_id}', 'CompanyCategoryController@button');

//    company Products
    Route::get('company_product_datatable/{company_id}', 'CompanyProductController@datatable')->name('company_product.datatable.data');
    Route::get('delete-company_product', 'CompanyProductController@destroy');
    Route::get('show-company_product/{id}', 'CompanyProductController@show');
    Route::get('create-company_product', 'CompanyProductController@create');
    Route::post('store-company_product', 'CompanyProductController@store');
    Route::get('edit-company_product/{id}', 'CompanyProductController@edit');
    Route::post('update-company_product', 'CompanyProductController@update');
    Route::get('add-company_product-button/{company_id}', 'CompanyProductController@button');


//    company Order
    Route::get('company_order_datatable/{company_id}', 'CompanyOrderController@datatable')
        ->name('company_order.datatable.data');
    Route::get('show-company_order/{id}', 'CompanyOrderController@show');

    Route::get('reports/orders', 'ReportController@OrderReport');
    Route::post('reports/orders', 'ReportController@OrderReport');


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
