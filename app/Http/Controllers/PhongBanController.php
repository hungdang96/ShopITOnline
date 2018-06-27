<?php

namespace App\Http\Controllers;

use App\ChucVuModel;
use App\NhanvienModel;
use App\PhongbanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhongBanController extends Controller
{
    //Danh sách phòng ban
    public function danhsach_phongban(){
        $data = PhongbanModel::all();
        return ['status' => true, 'data' => $data];
    }

    //Tạo mới phòng ban
    public function taomoi_phongban(Request $request){
        $validator = Validator::make($request->all(),[
            'MSPhongBan' => 'required | unique:phongban',
            'TenPhongBan' => 'required | unique:phongban',
            'TrangThai' => 'required'
        ],[
            'MSPhongBan.required' => 'Vui lòng nhập mã phòng ban!',
            'MSPhongBan.unique' => 'Mã phòng ban đã tồn tại!',
            'TenPhongBan.required' => 'Vui lòng nhập tên phòng ban!',
            'TenPhongBan.unique' => 'Tên phòng ban đã tồn tại!',
            'TrangThai.required' => 'Vui lòng chọn trạng thái!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];
        }

        $MSPhongBan = $request->MSPhongBan;
        $TenPhongBan = $request->TenPhongBan;
        $TrangThai = $request->TrangThai;
        $created_at = Controller::get_date();
        $LastModify = Controller::get_LastModify();

        PhongbanModel::create([
            'MSPhongBan' => $MSPhongBan,
            'TenPhongBan' => $TenPhongBan,
            'TrangThai' => $TrangThai,
            'created_at' => $created_at,
            'LastModify' => $LastModify
        ]);
        return ['status' => true, 'message' => 'Đã thêm phòng ban!'];
    }

    //Chỉnh sửa phòng ban
    public function chinhsua_phongba($MSPhongBan){
        $data = PhongbanModel::find($MSPhongBan);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.phongban.editUnit',compact('data',$data));
        }
        else{
            return ['status' => false, 'message' => ['Phòng ban không tồn tại!']];
        }
    }

    //Cập nhật phòng ban
    public function capnhat_phongban($MSPhongBan, Request $request){
        $validator = Validator::make($request->all(),[
            'MSPhongBan' => 'required | unique:phongban',
            'TenPhongBan' => 'required | unique:phongban',
            'TrangThai' => 'required'
        ],[
            'MSPhongBan.required' => 'Vui lòng nhập mã phòng ban!',
            'MSPhongBan.unique' => 'Mã phòng ban đã tồn tại!',
            'TenPhongBan.required' => 'Vui lòng nhập tên phòng ban!',
            'TenPhongBan.unique' => 'Tên phòng ban đã tồn tại!',
            'TrangThai.required' => 'Vui lòng chọn trạng thái!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];
        }

        $MSPhongBanNew = $request->MSPhongBan;
        $TenPhongBan = $request->TenPhongBan;
        $TrangThai = $request->TrangThai;
        $LastModify = Controller::get_LastModify();

        NhanvienModel::where('MSPhongBan',$MSPhongBan)
            ->update([
                'MSPhongBan' => $MSPhongBanNew,
            ]);
        PhongbanModel::where('MSPhongBan',$MSPhongBan)
            ->update([
                'MSPhongBan' => $MSPhongBanNew,
                'TenPhongBan' => $TenPhongBan,
                'TrangThai' => $TrangThai,
                'LastModify' => $LastModify
            ]);
        return ['status' => true, 'message' => 'Đã cập nhật phòng ban!'];
    }
}
