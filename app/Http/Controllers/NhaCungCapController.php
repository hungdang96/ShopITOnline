<?php

namespace App\Http\Controllers;

use App\NhacungcapModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NhaCungCapController extends Controller
{
    //Danh sách nhà cung cấp
    public function danhsach_nhacungcap(Request $request){
        $where = [];
        if($request->TenNCC){
            $where[] = ['TenNCC','=',$request->TenNCC];
        }
        if($request->SDT){
            $where[] = ['SDT', '=', $request->SDT];
        }
        if($request->MaTinh){
            $where[] = ['MaTinh','=',$request->MaTinh];
        }
        $data = NhacungcapModel::select(DB::raw("nhacungcap.*, tinhthanhpho.name"))
                ->leftjoin('tinhthanhpho','tinhthanhpho.matp', '=', 'nhacungcap.MaTinh')
                ->where($where)
                ->get();
        return ['status' => true, 'data' => $data];
    }

    //Tạo mới nhà cung cấp
    public function taomoi_nhacungcap(Request $request){
        $validator = Validator::make($request->all(),[
            'MSNCC' => 'required | unique:nhacungcap',
            'TenNCC' => 'required',
            'DiaChi' => 'required',
            'MaTinh' => 'required',
            'MaHuyen' => 'required',
            'MaPhuong' => 'required',
            'NguoiDaiDien' => 'required',
            'SDT' => 'required | unique:nhacungcap',
            'FAX' => 'required | unique:nhacungcap',
            'SoTKNganHang' => 'required',
            'TenNganHang' => 'required',
        ],[
            'MSNCC.required' => 'Vui lòng nhập mã số nhà cung cấp!',
            'MSNCC.unique' => 'Mã nhà cung cấp đã tồn tại!',
            'TenNCC.required' => 'Vui lòng nhập tên nhà cung cấp',
            'DiaChi.required' => 'Vui lòng nhập địa chỉ nhà cung cấp!',
            'MaTinh.required' => 'Vui lòng chọn tỉnh/tp',
            'MaHuyen.required' => 'Vui lòng chọn quận/huyện',
            'MaPhuong.required' => 'vui lòng chọn phường/xã',
            'NguoiDaiDien.required' => 'Vui lòng nhập tên người đại diện',
            'SDT.required' => 'Vui lòng nhập số điện thoại',
            'SDT.unique' => 'Số điện thoại đã tồn tại',
            'FAX.required' => 'Vui lòng nhập nhập số fax',
            'FAX.unique' => 'Số fax đã tồn tại!',
            'SoTKNganHang.required' => 'Vui lòng nhập số tài khoản ngân hàng!',
            'TenNganHang.required' => 'Vui lòng nhập tên tài khoản ngân hàng'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];;
        }

        $id = Controller::GUID();
        $MSNCC = $request->MSNCC;
        $TenNCC = $request->TenNCC;
        $DiaChi = $request->DiaChi;
        $MaTinh = $request->MaTinh;
        $MaHuyen = $request->MaHuyen;
        $MaPhuong = $request->MaPhuong;
        $NguoiDaiDien = $request->NguoiDaiDien;
        $SDT = $request->SDT;
        $FAX = $request->FAX;
        $SoTKNganHang = $request->SoTkNganHang;
        $TenNganHang = $request->TenNganHang;
        $TrangThai = $request->TrangThai;
        $LastModify = Controller::get_LastModify();

        NhacungcapModel::create([
            'id' => $id,
            'MSNCC' => $MSNCC,
            'TenNCC' => $TenNCC,
            'DiaChi' => $DiaChi,
            'MaTinh' => $MaTinh,
            'MaHuyen' => $MaHuyen,
            'MaPhuong' => $MaPhuong,
            'NguoiDaiDien' => $NguoiDaiDien,
            'SDT' => $SDT,
            'FAX' => $FAX,
            'SoTKNganHang' => $SoTKNganHang,
            'TenNganHang' => $TenNganHang,
            'TrangThai' => $TrangThai,
            'LastModify' => $LastModify
        ]);
        return ['status' => true, 'message' => 'Tạo nhà cung cấp thành công'];
    }

    public function chinhsua_nhacungcap($MSNCC){
        $data = NhacungcapModel::find($MSNCC);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.nhacungcap.editSupplier',compact($data));
        }
        else{
            return ['status' => false, 'message' => ['Nhà cung cấp không tồn tại!']];
        }
    }

    public function capnhat_nhacungcap($id, Request $request){
        $validator = Validator::make($request->all(),[
            'MSNCC' => 'required | unique:nhacungcap',
            'TenNCC' => 'required',
            'DiaChi' => 'required',
            'MaTinh' => 'required',
            'MaHuyen' => 'required',
            'MaPhuong' => 'required',
            'NguoiDaiDien' => 'required',
            'SDT' => 'required | unique:nhacungcap',
            'FAX' => 'required | unique:nhacungcap',
            'SoTKNganHang' => 'required',
            'TenNganHang' => 'required',
        ],[
            'MSNCC.required' => 'Vui lòng nhập mã số nhà cung cấp!',
            'MSNCC.unique' => 'Mã nhà cung cấp đã tồn tại!',
            'TenNCC.required' => 'Vui lòng nhập tên nhà cung cấp',
            'DiaChi.required' => 'Vui lòng nhập địa chỉ nhà cung cấp!',
            'MaTinh.required' => 'Vui lòng chọn tỉnh/tp',
            'MaHuyen.required' => 'Vui lòng chọn quận/huyện',
            'MaPhuong.required' => 'vui lòng chọn phường/xã',
            'NguoiDaiDien.required' => 'Vui lòng nhập tên người đại diện',
            'SDT.required' => 'Vui lòng nhập số điện thoại',
            'SDT.unique' => 'Số điện thoại đã tồn tại',
            'FAX.required' => 'Vui lòng nhập nhập số fax',
            'FAX.unique' => 'Số fax đã tồn tại!',
            'SoTKNganHang.required' => 'Vui lòng nhập số tài khoản ngân hàng!',
            'TenNganHang.required' => 'Vui lòng nhập tên tài khoản ngân hàng'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];;
        }

        $MSNCC = $request->MSNCC;
        $TenNCC = $request->TenNCC;
        $DiaChi = $request->DiaChi;
        $MaTinh = $request->MaTinh;
        $MaHuyen = $request->MaHuyen;
        $MaPhuong = $request->MaPhuong;
        $NguoiDaiDien = $request->NguoiDaiDien;
        $SDT = $request->SDT;
        $FAX = $request->FAX;
        $SoTKNganHang = $request->SoTkNganHang;
        $TenNganHang = $request->TenNganHang;
        $TrangThai = $request->TrangThai;
        $LastModify = Controller::get_LastModify();

        NhacungcapModel::where('id', $id)
            ->update([
                'MSNCC' => $MSNCC,
                'TenNCC' => $TenNCC,
                'DiaChi' => $DiaChi,
                'MaTinh' => $MaTinh,
                'MaHuyen' => $MaHuyen,
                'MaPhuong' => $MaPhuong,
                'NguoiDaiDien' => $NguoiDaiDien,
                'SDT' => $SDT,
                'FAX' => $FAX,
                'SoTKNganHang' => $SoTKNganHang,
                'TenNganHang' => $TenNganHang,
                'TrangThai' => $TrangThai,
                'LastModify' => $LastModify
            ]);
        return ['status' => true, 'message' => 'Cập nhật nhà cung cấp thành công!'];
    }
}
