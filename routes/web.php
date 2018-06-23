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

use Illuminate\Support\Facades\Route;



//Nhân viên
Route::group(['prefix' => 'nhanvien'], function (){
    Route::get('create', function (){return view('admin.nhanvien.formtaonv');})->name('createStaff');
    Route::post('taomoi_nhanvien', 'NhanVienController@taomoi_nhanvien')->name('insertStaff'); //Tạo nhân viên
    Route::get('danhsach_nhanvien', 'NhanVienController@danhsach_nhanvien')->name('listStaff'); //Danh sách nhân viên
    Route::get('chinhsua_nhanvien/{IDNV}', 'NhanVienController@chinhsua_nhanvien')->name('editStaff'); //Danh sách nhân viên
    Route::post('capnhat_nhanvien/{IDNV}', 'NhanVienController@capnhat_nhanvien')->name('updateStaff'); //Danh sách nhân viên
});

//Chi nhánh
Route::group(['prefix' => 'chinhanh'],function (){
   Route::get('create', function (){return view('admin.chinhanh.formcreate');})->name('createBranch');
    Route::post('taomoi_chinhanh', 'ChiNhanhController@taomoi_chinhanh')->name('insertStaff'); //Tạo nhân viên
    Route::get('danhsach_chinhanh', 'ChiNhanhController@taomoi_chinhanh')->name('listStaff'); //Danh sách nhân viên
    Route::get('chinhsua_chinhanh/{IDNV}', 'ChiNhanhController@taomoi_chinhanh')->name('editStaff'); //Danh sách nhân viên
    Route::post('capnhat_chinhanh/{IDNV}', 'ChiNhanhController@taomoi_chinhanh')->name('updateStaff'); //Danh sách nhân viên
});

//Khách hàng
Route::group(['prefix' => 'khachhang'],function (){
    Route::get('create', function (){return view('admin.khachhang.formcreate');})->name('createCustomer');
    Route::post('taomoi_khachhang', 'KhachHangController@taomoi_khachhang')->name('insertCustomer'); //Tạo nhân viên
    Route::get('danhsach_khachhang', 'KhachHangController@danhsach_khachhang')->name('listCustomer'); //Danh sách nhân viên
    Route::get('chinhsua_khachhang/{IDNV}', 'KhachHangController@chinhsua_khachhang')->name('editCustomer'); //Danh sách nhân viên
    Route::post('capnhat_khachhang/{IDNV}', 'KhachHangController@capnhat_khachhang')->name('updateCustomer'); //Danh sách nhân viên
});

//Danh mục
Route::group(['prefix' => 'danhmuc'],function (){
    Route::get('create', function (){return view('admin.danhmuc.formcreate');})->name('createCategory');
    Route::post('taomoi_danhmuc', 'DanhMucController@taomoi_danhmuc')->name('insertCustomer'); //Tạo nhân viên
    Route::get('danhsach_danhmuc', 'DanhMucController@danhsach_danhmuc')->name('listCustomer'); //Danh sách nhân viên
    Route::get('chinhsua_danhmuc/{IDNV}', 'DanhMucController@chinhsua_danhmuc')->name('editCustomer'); //Danh sách nhân viên
    Route::post('capnhat_danhmuc/{IDNV}', 'DanhMucController@capnhat_danhmuc')->name('updateCustomer'); //Danh sách nhân viên
});


//Sản phẩm

//Chuyên ngành

//Trình độ

//Phòng ban

//Roles

//Users

//Nhập kho

//Xuất kho

//Kho

//Bán hàng

//Đặt hàng
