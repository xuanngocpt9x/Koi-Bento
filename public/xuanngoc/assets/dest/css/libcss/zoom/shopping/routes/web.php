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

/**
 * Giao diện trang chủ chính
 */
Route::get('index', [
    'as'=>'trang-chu',
    'uses'=>'PageController@getIndex'
]);

/**
 * Giao diện loại sản phẩm
 */
Route::get('loai-sanpham/{type}',[
   'as'=>'loaisanpham',
    'uses'=>'PageController@getLoaiSp'
]);

/**
 * Giao diện chi tiết sản phẩm
 */
Route::get('chitiet-sanpham/{id}',[
   'as'=>'chitietsanpham',
   'uses'=>'PageController@getChitiet'
]);

/**
 * Giao diện liên hệ Contact
 */
Route::get('lien-he',[
   'as'=>'lienhe',
    'uses'=>'PageController@getLienhe'
]);

/**
 * Giao diện trang giới thiệu
 */
Route::get('gioi-thieu',[
   'as'=>'gioithieu',
   'uses'=>'PageController@getGioiThieu'
]);

/**
 * Thêm giỏ hàng
 */
Route::get('add-to-cart/{id}',[
   'as'=>'themgiohang',
    'uses'=>'PageController@getAddtoCart'
]);

/**
 * Xóa giỏ hàng đã thêm
 */
Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'PageController@getDelItemCart'
]);

/**
 * Đặt hàng và lưu
 */
Route::get('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@getCheckout'
]);
Route::post('dat-hang',[
    'as'=>'dathang',
    'uses'=>'PageController@postCheckout'
]);

/**
 * Đăng nhập
 */
Route::get('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'PageController@getLogin'
]);

Route::post('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'PageController@postLogin'
]);

/**
 * Đăng ký tài khoản
 */
Route::get('dang-ki',[
    'as'=>'signin',
    'uses'=>'PageController@getSignin'
]);

Route::post('dang-ki',[
    'as'=>'signin',
    'uses'=>'PageController@postSignin'
]);

/**
 * Đăng xuất
 */
Route::get('dang-xuat',[
    'as'=>'logout',
    'uses'=>'PageController@postLogout'
]);

/**
 * Chức Năng Tìm Kiếm
 */
Route::get('search',[
    'as'=>'search',
    'uses'=>'PageController@getSearch'
]);
