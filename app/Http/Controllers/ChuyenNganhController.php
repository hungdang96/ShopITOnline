<?php

namespace App\Http\Controllers;

use App\ChuyennganhModel;
use App\NhanvienModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChuyenNganhController extends Controller
{
    //Danh sách chuyên ngành
    public function danhsach_chuyenganh(){
        $data = ChuyennganhModel::all();
        return ['status' => true, 'data' => $data];
    }

    //Tạo mới chuyên ngành
    public function taomoi_chuyennganh(Request $request){
        $validator = Validator::make($request->all(),[
            'MSChuyenNganh' => 'required | unique:chuyennganh',
            'TenChuyenNganh' => 'required | unique:chuyennganh',
            'TrangThai' => 'required'
        ],[
            'MSChuyenNganh.required' => 'Vui lòng nhập mã chuyên ngành!',
            'MSChuyenNganh.unique' => 'Mã chuyên ngành đã tồn tại!',
            'TenChuyenNganh.required' => 'Vui lòng nhập tên chuyên ngành',
            'TenChuyenNganh.unique' => 'Tên chuyên ngành đã tồn tại!',
            'TrangThai.required' => 'Vui lòng chọn trạng thái!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => [$validator->errors()->all()]];
        }
        $MSChuyenNganh = $request->MSChuyenNganh;
        $TenChuyenNganh = $request->TenChuyenNganh;
        $TrangThai = $request->TrangThai;
        $created_at = Controller::get_date();
        $LastModify = Controller::get_LastModify();

        ChuyennganhModel::create([
            'MSChuyenNganh' => $MSChuyenNganh,
            'TenChuyenNganh' => $TenChuyenNganh,
            'TrangThai' => $TrangThai,
            'created_at' => $created_at,
            'LastModify' => $LastModify
        ]);
        return ['status' => true, 'message' => 'Đã tạo chuyên ngành thành công!'];
    }

    //Chỉnh sửa chuyên ngành
    public function chinhsua_chuyennganh($MSChuyenNganh){
        $data = ChuyennganhModel::find($MSChuyenNganh);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.chuyennganh.editField',compact('data',$data));
        }
        else{
            return ['status' => false, 'message' => ['Chuyên ngành không tồn tại!']];
        }
    }

    //Cập nhật chuyên ngành
    public function capnhat_chuyennganh($MSChuyenNganh, Request $request){
        $validator = Validator::make($request->all(),[
            'MSChuyenNganh' => 'required | unique:chuyennganh',
            'TenChuyenNganh' => 'required | unique:chuyennganh',
            'TrangThai' => 'required'
        ],[
            'MSChuyenNganh.required' => 'Vui lòng nhập mã chuyên ngành!',
            'MSChuyenNganh.unique' => 'Mã chuyên ngành đã tồn tại!',
            'TenChuyenNganh.required' => 'Vui lòng nhập tên chuyên ngành!',
            'TenChuyenNganh.unique' => 'Tên chuyên ngành đã tồm tại!',
            'TrangThai.required' => 'Vui lòng chọn trạng thái'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => [$validator->errors()->all()]];
        }

        $MSChuyenNganhNew = $request->MSChuyenNganh;
        $TenChuyenNganh = $request->TenChuyenNganh;
        $TrangThai = $request->TrangThai;
        $LastModify = Controller::get_LastModify();

        NhanvienModel::where('MSChuyenNganh',$MSChuyenNganh)
            ->update([
                'MSChuyenNganh' => $MSChuyenNganhNew
            ]);

        ChuyennganhModel::where('MSChuyenNganh',$MSChuyenNganh)
            ->update([
                'MSChuyenNganh' => $MSChuyenNganhNew,
                'TenChuyenNganh' => $TenChuyenNganh,
                'TrangThai' => $TrangThai,
                'LastModify' => $LastModify
            ]);

        return ['status' => true, 'message' => 'Đã cập nhật chuyên ngành thành công!'];
    }
}
