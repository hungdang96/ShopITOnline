<?php

namespace App\Http\Controllers;

use App\DanhmucModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanhMucController extends Controller
{
    //Danh sách danh mục
    public function danhsach_danhmuc(){
        $data = DanhmucModel::all();
        return  ['status' => true, 'data' => $data];
    }

    //Tạo mới danh mục
    public function taomoi_danhmuc(Request $request){
        $validator = Validator::make($request->all(),[
            'TenDanhMuc' => 'required | unique:danhmuc',
            'MoTa' => 'required',
            'TrangThai' => 'required'
        ],[
            'TenDanhMuc.required' => 'Vui lòng nhập tên danh mục',
            'TenDanhMuc.unique' => 'Tên danh mục',
            'Mota.required' => 'Vui lòng nhập mô tả',
            'TrangThai.required' => 'Vui lòng chọn trạng thái'
        ]);
        if($validator->fails()){
            return ['status' => false, 'massage' => [$validator->errors()->all()]];
        }
        $MSDanhMuc = Controller::GUID();
        $TenDanhMuc = $request->TenDanhMuc;
        $MoTa = $request->MoTa;
        $DanhMucCha = $request->DanhMucCha;
        $TrangThai = $request->TrangThai;
        $created_at = Controller::get_date();
        $LastModify = Controller::get_LastModify();

        DanhmucModel::create([
            'MSDanhMuc' => $MSDanhMuc,
            'TenDanhMuc' => $TenDanhMuc,
            'MoTa' => $MoTa,
            'DanhMucCha' => $DanhMucCha,
            'TrangThai' => $TrangThai,
            'created_at' => $created_at,
            'LastModify' => $LastModify
        ]);

        return ['status' => true, 'message' => 'Đã tạo danh mục thành công!'];
    }

    //Chỉnh sửa danh mục
    public function chinhsua_danhmuc($MSDanhMuc, Request $request){
        $data = DanhmucModel::find($MSDanhMuc);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.danhmuc.editCategory',compact('data', $data));
        }
        else{
            return ['status' => false, 'message' => ['Danh mục không tồn tại!']];
        }
    }

    //Cập nhật danh mục
    public function capnhat_danhmuc($MSDanhMuc, Request $request){
        
    }
}
