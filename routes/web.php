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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['prefix' => 'nhanvien'], function (){
    Route::get('create', function (){
       return view('admin.nhanvien.formtaonv');
    })->name('createStaff');
    Route::post('taomoi_nhanvien', 'NhanVienController@taomoi_nhanvien')->name('insertStaff'); //Tạo nhân viên
    Route::get('danhsach_nhanvien', 'NhanVienController@danhsach_nhanvien')->name('listStaff'); //Danh sách nhân viên
    Route::get('chinhsua_nhanvien/{IDNV}', 'NhanVienController@chinhsua_nhanvien')->name('editStaff'); //Danh sách nhân viên
    Route::post('capnhat_nhanvien/{IDNV}', 'NhanVienController@capnhat_nhanvien')->name('updateStaff'); //Danh sách nhân viên
});