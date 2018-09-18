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
route::get('index',[	
	'as'=>'trang-chu',
	'uses'=>'PageController@getIndex'
]);
route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);
route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
]);
route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'PageController@getLienHe'
]);
route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioiThieu'
]);
route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddToCart'
]);
route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@getCheckout'
]);
route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'PageController@postCheckout'
]);
// chức năng đăng nhập
route::get('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@getLogin'
]);
route::post('dang-nhap',[
	'as'=>'login',
	'uses'=>'PageController@postLogin'
]);

// chức năng đăng ký
route::get('dang-ki',[
	'as'=>'sigin',
	'uses'=>'PageController@getSignin'
]);
route::post('dang-ki',[
	'as'=>'sigin',
	'uses'=>'PageController@postSignin'
]);
//đăng xuất

route::get('dang-xuat',[
	'as'=>'logout',
	'uses'=>'PageController@getLogout'
]);
// tìm kiếm
route::get('search',[
	'as'=>'search',
	'uses'=>'PageController@getSearch'
]);
// thêm hàng
route::get('additems',[
	'as'=>'additem',
	'uses'=>'PageController@getAddItems'
]);
// làm phần của admin
route::group(['prefix'=>'admin'],function(){

	route::group(['prefix'=>'theloai'],function(){
		route::get('danhsach','TheLoaiController@getDanhSach');

		route::get('sua/{id}','TheLoaiController@getSua');
		route::post('sua/{id}','TheLoaiController@postSua');

		route::get('them','TheLoaiController@getThem');
		route::post('them','TheLoaiController@postThem');

		route::get('xoa/{id}','TheLoaiController@getXoa');
	});

		route::group(['prefix'=>'mathang'],function(){

		route::get('danhsach','MatHangController@getDanhSach');

		route::get('sua/{id}','MatHangController@getSua');
		route::post('sua/{id}','MatHangController@postSua');

		route::get('them','MatHangController@getThem');
		route::post('them','MatHangController@postThem');

		route::get('xoa/{id}','MatHangController@getXoa');
	});

		route::group(['prefix'=>'users'],function(){

		route::get('danhsach','UserController@getDanhSach');

		route::get('sua/{id}','UserController@getSua');
		route::post('sua/{id}','UserController@postSua');

		route::get('them','UserController@getThem');
		route::post('them','UserController@postThem');

		route::get('xoa/{id}','UserController@getXoa');
	});

});