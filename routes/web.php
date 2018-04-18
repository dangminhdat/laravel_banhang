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

Route::get("/",["as"=>"pages.index","uses"=>"PagesController@index"]);

Route::get("trang-chu",["as"=>"pages.trangchu","uses"=>"PagesController@index"]);

Route::get("loai-san-pham/{id}",["as"=>"pages.loaisanpham","uses"=>"LoaiSanPhamController@getLoaiSanPham"]);

Route::get("san-pham/{id}",["as"=>"pages.sanpham","uses"=>"SanPhamController@getSanPham"]);

Route::get("gioi-thieu",["as"=>"pages.gioithieu","uses"=>"PagesController@gioithieu"]);

Route::get("lien-he",["as"=>"pages.lienhe","uses"=>"PagesController@lienhe"]);

Route::get("add-cart/{id}",["as"=>"pages.addcart","uses"=>"CartController@add_cart"]);

Route::get("delete-cart/{id}",["as"=>"pages.deletecart","uses"=>"CartController@delete_cart"]);

Route::get("dat-hang",["as"=>"pages.dathang","uses"=>"CartController@getDatHang"]);

Route::post("dathang",["as"=>"pages.postDatHang","uses"=>"CartController@postDatHang"]);

Route::get("dangnhap",["as"=>"pages.dangnhap","uses"=>"PagesController@dangnhap"])->middleware('loginhome');

Route::get("dangky",["as"=>"pages.dangky","uses"=>"PagesController@dangky"]);

Route::post("dangnhap",["as"=>"pages.postDangNhap","uses"=>"PagesController@postDangNhap"]);

Route::post("dangky",["as"=>"pages.postDangKy","uses"=>"PagesController@postDangKy"]);

Route::get("dangxuat",["as"=>"pages.dangxuat","uses"=>"PagesController@dangxuat"]);

Route::get("timkiem",["as"=>"pages.timkiem","uses"=>"PagesController@timkiem"]);