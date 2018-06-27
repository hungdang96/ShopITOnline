<?php

namespace App\Http\Controllers;

use App\ChiNhanhModel;
use App\QuanHuyenModel;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\AssignOp\Concat;

class ChiNhanhController extends Controller
{
    public function danhsach_chinhanh(Request $request){
        $where = [];
        if($request->TenCN){
            $where[] = ['TenCN','LIKE','%'.$request->TenCN.'%'];
        }
        if($request->SDT){
            $where[] = ['SDT','=',$request->SDT];
        }
        if($request->MaTinh){
            $where[] = ['MaTinh', '=', $request->MaTinh];
        }
        $data = ChiNhanhModel::select(DB::raw("MSCN, TenCN, DiaChi, SDT, tinhthanhpho.name as TenTinh, quanhuyen.name as TenHuyen, xaphuong.name as TenPhuong, LastModify"))
                ->leftjoin('tinhthanhpho','tinhthanhpho.matp','=','chinhanh.MaTinh')
                ->leftjoin('quanhuyen','quanhuyen.maqh', '=', 'chinhanh.MaHuyen')
                ->where($where)
                ->get();
        if($data){
            return ['status' => true, 'data' => $data];
        }
        else{
            return ['status' => false, 'message' => ['Không tìm thấy chi nhánh nào!']];
        }
    }

    public function taomoi_chinhanh(Request $request){
        $validator = Validator::make($request->all(),[
            'TenCN' => 'required | unique:chinhanh',
            'DiaChi' => 'required | unique:chinhanh',
            'SDT' => 'required | unique:chinhanh',
            'MaTinh' => 'required',
            'MaHuyen' => 'required',
            'MaPhuong' => 'required'
        ],[
            'TenCN.required' => 'Vui lòng nhập tên chi nhánh!',
            'TenCN.unique' => 'Chi nhánh đã tồn tại!',
            'DiaChi.required' => 'Vui lòng nhập địa chỉ của chi nhánh!',
            'DiaChi.unique' => 'Địa chỉ chi nhánh bị trùng!',
            'SDT.required' => 'Vui lòng nhập số điện thoại của chi nhánh!',
            'SDT.unique' => 'Số điện thoại chi nhánh đã tồn tại!',
            'MaTinh.required' => 'Vui lòng chọn tỉnh/tp!',
            'MaHuyen.required' => 'Vui lòng chọn quận/huyện!',
            'MaPhuong.required' => 'Vui lòng chọn xã/phường!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];
        }

        $MSCN = Controller::GUID();
        ChiNhanhModel::create([
            'MSCN' => $MSCN,
            'TenCN' => $request->TenCN,
            'DiaChi' => $request->DiaChi,
            'SDT' => $request->SDT,
            'MaTinh' => $request->MaTinh,
            'MaHuyen' => $request->MaHuyen,
            'MaPhuong' => $request->MaPhuong,
            'TrangThai' => $request->TrangThai,
            'created_at' => Controller::get_date(),
            'LastModify' => Controller::get_LastModify()
        ]);
        return ['status' => true, 'message' => 'Tạo chi nhánh thành công!'];
    }

    public function chinhsua_chinhanh($MSCN){
        $data = ChiNhanhModel::find($MSCN);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.chinhanh.editbranches', compact('data', $data));
        }
        else{
            return ['status' => false, 'message' => ['Chi nhánh không tồn tại!']];
        }
    }

    public function update_chinhanh($MSCN, Request $request){
        $data = ChiNhanhModel::find($MSCN);
        if(isset($data)){
            $validator = Validator::make($request->all(),[
                'TenCN' => 'required | unique:chinhanh',
                'DiaChi' => 'required | unique:chinhanh',
                'SDT' => 'required | unique:chinhanh',
                'MaTinh' => 'required',
                'MaHuyen' => 'required',
                'MaPhuong' => 'required'
            ],[
                'TenCN.required' => 'Vui lòng nhập tên chi nhánh!',
                'TenCN.unique' => 'Chi nhánh đã tồn tại!',
                'DiaChi.required' => 'Vui lòng nhập địa chỉ của chi nhánh!',
                'DiaChi.unique' => 'Địa chỉ chi nhánh bị trùng!',
                'SDT.required' => 'Vui lòng nhập số điện thoại của chi nhánh!',
                'SDT.unique' => 'Số điện thoại chi nhánh đã tồn tại!',
                'MaTinh.required' => 'Vui lòng chọn tỉnh/tp!',
                'MaHuyen.required' => 'Vui lòng chọn quận/huyện!',
                'MaPhuong.required' => 'Vui lòng chọn xã/phường!'
            ]);
            if($validator->fails()){
                return ['status' => false, 'message' => $validator->errors()->all()];
            }

            $data->update([
                'TenCN' => $request->TenCN,
                'DiaChi' => $request->DiaChi,
                'SDT' => $request->SDT,
                'MaTinh' => $request->MaTinh,
                'MaHuyen' => $request->MaHuyen,
                'MaPhuong' => $request->MaPhuong,
                'TrangThai' => $request->TrangThai,
                'LastModiy' => Controller::get_LastModify()
            ]);
            return ['status' => true, 'message' => 'Đã cập nhật chi nhánh!'];
        }
        else{
            return ['status' => false, 'message' => ['Chi nhánh không tồn tại']];
        }
    }
}
