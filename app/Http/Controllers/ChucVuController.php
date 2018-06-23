<?php

namespace App\Http\Controllers;

use App\ChucVuModel;
use App\NhanvienModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChucVuController extends Controller
{
    //Danh sách chức vụ
    public function danhsach_chucvu(){
        $data = ChucVuModel::all();
        return ['status' => true, 'data' => $data];
    }

    //Tạo mới chức vụ
    public function taomoi_chucvu(Request $request){
        $validator = Validator::make($request->all(),[
            'MSChucVu' => 'required | unique:chucvu',
            'TenChucVu' => 'required | unique:chucvu',
            'TrangThai' => 'required'
        ],[
            'MSChucVu.required' => 'Vui lòng nhập mã chức vụ!',
            'MSChucVu.unique' => 'Mã chức vụ đã tồn tại!',
            'TenChucVu.required' => 'Vui lòng nhập tên chức vụ!',
            'TenChucVu.unique' => 'Tên chức vụ đã tồn tại!',
            'TrangThai.required' => 'Vui lòng chọn trạng thái!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => [$validator->errors()->all()]];
        }

        $MSChucVu = $request->MSChucVu;
        $TenChucVu = $request->TenChucVu;
        $TrangThai = $request->TrangThai;
        $LastModify = Controller::get_LastModify();
        $created_at = Controller::get_date();

        ChucVuModel::create([
            'MSChucVu' => $MSChucVu,
            'TenChucVu' => $TenChucVu,
            'TrangThai' => $TrangThai,
            'created_at' => $created_at,
            'LastModify' => $LastModify
        ]);

        return ['status' => true, 'message' => 'Đã thêm chức vụ thành công!'];
    }

    //Chỉnh sửa chức vụ
    public function chinhsua_chucvu($MSChucVu){
        $data = ChucVuModel::find($MSChucVu);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.chucvu.editPosition', compact('data', $data));
        }
        else{
            return ['status' => false, 'message' => ['Chức vụ không tồn tại!']];
        }
    }

    //Cập nhật chức vụ
    public function capnhat_chucvu($MSChucVu, Request $request){
        $validator = Validator::make($request->all(),[
            'MSChucVu' => 'required | unique:chucvu',
            'TenChucVu' => 'required | unique:chucvu',
            'TrangThai' => 'required'
        ],[
            'MSChucVu.required' => 'Vui lòng nhập mã chức vụ!',
            'MSChucVu.unique' => 'Mã chức vụ đã tồn tại!',
            'TenChucVu.required' => 'Vui lòng nhập tên chức vụ!',
            'TenChucVu.unique' => 'Tên chức vụ đã tồn tại!',
            'TrangThai.required' => 'Vui lòng chọn trạng thái!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => [$validator->errors()->all()]];
        }

        $MSChucVuNew = $request->MSChucVu;
        $TenChucVu = $request->TenChucVu;
        $TrangThai = $request->TrangThai;
        $LastModify = Controller::get_LastModify();

        NhanvienModel::where('MSChucVu', $MSChucVu)
            ->update([
                'MSChucVu' => $MSChucVuNew
            ]);
        ChucVuModel::where('MSChucVu',$MSChucVu)
            ->update([
                'MSChucVu' => $MSChucVuNew,
                'TenChucVu' => $TenChucVu,
                'TrangThai' => $TrangThai,
                'LastModify' => $LastModify
            ]);
        return ['status' => true, 'message' => 'Đã cập nhật chức vụ!'];
    }
}
