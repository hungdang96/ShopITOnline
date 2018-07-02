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

Route::get('/',function (){
    return view('home');
})->name('welcome');

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
Route::group(['prefix' => 'sanpham'],function (){
    Route::get('create', function (){return view('admin.sanpham.formcreate');})->name('createProduct');
    Route::post('taomoi_sanpham', 'SanPhamController@taomoi_sanpham')->name('insertProduct'); //Tạo nhân viên
    Route::get('danhsach_sanpham', 'SanPhamController@danhsach_sanpham')->name('listProduct'); //Danh sách nhân viên
    Route::get('chinhsua_sanpham/{IDNV}', 'SanPhamController@chinhsua_sanpham')->name('editProduct'); //Danh sách nhân viên
    Route::post('capnhat_sanpham/{IDNV}', 'SanPhamController@capnhat_sanpham')->name('updateProduct'); //Danh sách nhân viên
});

//Chuyên ngành
Route::group(['prefix' => 'chuyennganh'],function (){
    Route::get('create', function (){return view('admin.chuyennganh.formcreate');})->name('createField');
    Route::get('taomoi_chuyennganh', 'ChuyenNganhController@taomoi_chuyennganh')->name('insertField'); //Tạo nhân viên
    Route::get('danhsach_chuyennganh', 'ChuyenNganhController@danhsach_chuyennganh')->name('listField'); //Danh sách nhân viên
    Route::get('chinhsua_chuyennganh/{IDNV}', 'ChuyenNganhController@chinhsua_chuyennganh')->name('editField'); //Danh sách nhân viên
    Route::get('capnhat_chuyennganh/{IDNV}', 'ChuyenNganhController@capnhat_chuyennganh')->name('updateField'); //Danh sách nhân viên
});

//Trình độ
Route::group(['prefix' => 'trinhdo'],function (){
    Route::get('create', function (){return view('admin.trinhdo.formcreate');})->name('createLevel');
    Route::post('taomoi_trinhdo', 'TrinhDoController@taomoi_trinhdo')->name('insertLevel'); //Tạo nhân viên
    Route::get('danhsach_trinhdo', 'TrinhDoController@danhsach_trinhdo')->name('listLevel'); //Danh sách nhân viên
    Route::get('chinhsua_trinhdo/{IDNV}', 'TrinhDoController@chinhsua_trinhdo')->name('editLevel'); //Danh sách nhân viên
    Route::post('capnhat_trinhdo/{IDNV}', 'TrinhDoController@capnhat_trinhdo')->name('updateLevel'); //Danh sách nhân viên
});

//Chức vụ
Route::group(['prefix' => 'chucvu'],function (){
    Route::get('create', function (){return view('admin.chucvu.formcreate');})->name('createPosition');
    Route::post('taomoi_chucvu', 'ChucVuController@taomoi_chucvu')->name('insertPosition'); //Tạo nhân viên
    Route::get('danhsach_chucvu', 'ChucVuController@danhsach_chucvu')->name('listPosition'); //Danh sách nhân viên
    Route::get('chinhsua_chucvu/{IDNV}', 'ChucVuController@chinhsua_chucvu')->name('editPosition'); //Danh sách nhân viên
    Route::post('capnhat_chucvu/{IDNV}', 'ChucVuController@capnhat_chucvu')->name('updatePosition'); //Danh sách nhân viên
});

//Phòng ban
Route::group(['prefix' => 'phongban'],function (){
    Route::get('create', function (){return view('admin.phongban.formcreate');})->name('createUnit');
    Route::post('taomoi_phongban', 'PhongBanController@taomoi_phongban')->name('insertUnit'); //Tạo nhân viên
    Route::get('danhsach_phongban', 'PhongBanController@danhsach_phongban')->name('listUnit'); //Danh sách nhân viên
    Route::get('chinhsua_phongban/{IDNV}', 'PhongBanController@chinhsua_phongban')->name('editUnit'); //Danh sách nhân viên
    Route::post('capnhat_phongban/{IDNV}', 'PhongBanController@capnhat_phongban')->name('updateUnit'); //Danh sách nhân viên
});

//Roles
Route::group(['prefix' => 'role'],function (){
    Route::get('create', function (){return view('admin.role.formcreate');})->name('createRole');
    Route::post('taomoi_role', 'RoleController@taomoi_role')->name('insertRole'); //Tạo nhân viên
    Route::get('danhsach_role', 'RoleController@danhsach_role')->name('listRole'); //Danh sách nhân viên
    Route::get('chinhsua_role/{IDNV}', 'RoleController@chinhsua_role')->name('editRole'); //Danh sách nhân viên
    Route::post('capnhat_role/{IDNV}', 'RoleController@capnhat_role')->name('updateRole'); //Danh sách nhân viên
});

//Users
Route::group(['prefix' => 'user'],function (){
    Route::get('create', function (){return view('admin.user.formcreate');})->name('createUser');
    Route::post('taomoi_user', 'UserController@taomoi_user')->name('insertUser'); //Tạo nhân viên
    Route::get('danhsach_user', 'UserController@danhsach_user')->name('listUser'); //Danh sách nhân viên
    Route::get('chinhsua_user/{IDNV}', 'UserController@chinhsua_user')->name('editUser'); //Danh sách nhân viên
    Route::post('capnhat_user/{IDNV}', 'UserController@capnhat_user')->name('updateUser'); //Danh sách nhân viên
});

//Quan ly kho
Route::group(['prefix' => 'quanlykho'],function (){
   Route::group(['prefix' => 'nhapkho'],function (){
       //
   });

   Route::group(['prefix' => 'xuatkho'],function (){
       //
   });

   Route::group(['prefix' => 'kiemkho'],function (){
       //
   });
});

//Bán hàng
Route::group(['prefix' => 'banhang'],function (){
    Route::get('create', function (){return view('admin.banhang.formcreate');})->name('createSellOrder');
    Route::post('taomoi_donbanhang', 'XuLyBanHangController@taomoi_donbanhang')->name('insertSellOrder'); //Tạo nhân viên
    Route::get('danhsach_donbanhang', 'XuLyBanHangController@danhsach_donbanhang')->name('listSellOrder'); //Danh sách nhân viên
    Route::get('chinhsua_donbanhang/{IDNV}', 'XuLyBanHangController@chinhsua_donbanhang')->name('editSellOrder'); //Danh sách nhân viên
    Route::post('capnhat_donbanhang/{IDNV}', 'XuLyBanHangController@capnhat_donbanhang')->name('updateSellOrder'); //Danh sách nhân viên
});

//Đặt hàng
Route::group(['prefix' => 'dathang'],function (){
    Route::get('create', function (){return view('admin.dathang.formcreate');})->name('createOrder');
    Route::post('taomoi_dondathang', 'XuLyDatHangController@taomoi_dondathang')->name('insertOrder'); //Tạo nhân viên
    Route::get('danhsach_dondathang', 'XuLyDatHangController@danhsach_dondathang')->name('listOrder'); //Danh sách nhân viên
    Route::get('chinhsua_dondathang/{IDNV}', 'XuLyDatHangController@chinhsua_dondathang')->name('editOrder'); //Danh sách nhân viên
    Route::post('capnhat_dondathang/{IDNV}', 'XuLyDatHangController@capnhat_dondathang')->name('updateOrder'); //Danh sách nhân viên
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
