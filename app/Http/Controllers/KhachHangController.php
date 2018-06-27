<?php

namespace App\Http\Controllers;

use App\KhachhangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KhachHangController extends Controller
{
    //Danh sách khách hàng
    public function danhsach_khachhang(Request $request){
        $where = [];
        $where[] = ['MaTinh', '=', $request->MaTinh];
        if($request->TenKH){
            $where[] = ['TenKH','LIKE','%'.$request->TenKH.'%'];
        }
        if($request->CMND){
            $where[] = ['CMND','=',$request->CMND];
        }
        if($request->SDT){
            $where[] = ['SDT','LIKE','%'.$request->SDT.'%'];
        }
        $data = KhachhangModel::where($where)
                ->orderBy('MaTinh','DESC')
                ->offset($request->page * 20)
                ->limit(20)
                ->get();
        return ['status' => true, 'data' => $data];
    }

    public function taomoi_khachhang(Request $request){
        $validator = Validator::make($request->all(),[
            'TenKH' => 'required',
            'CMND' => 'required | unique:khachhang',
            'SDT' => 'required | unique:khachhang',
            'GioiTinh' => 'required | unique:khachhang',
            'NgaySinh' => 'required',
            'SoNha' => 'required',
            'DiaChiGiaoHang' => 'required',
            'MaTinh' => 'required',
            'MaHuyen' => 'required',
            'MaPhuong' => 'required',
        ],[
            'TenKH.required' => 'Vui lòng nhập tên khách hàng!',
            'CMND.required' => 'Vui lòng nhập số CMND!',
            'CMND.unique' => 'Số CMND đã tồn tại!',
            'SDT.required' => 'Vui lòng nhập số điện thoại khách hàng!',
            'SDT.unique' => 'Số điện thoại đã tồn tại!',
            'GioiTinh.required' => 'Vui lòng chọn giới tính!',
            'NgaySinh.required' => 'Vui lòng chọn ngày sinh!',
            'SoNha.required' => 'Vui lòng nhập số nhà!',
            'DiaChiGiaoHang.required' => 'Vui lòng nhập địa chỉ giao hàng!',
            'MaTinh.required' => 'Vui lòng chọn tỉnh/tp!',
            'MaHuyen.required' => 'Vui lòng chọn quận/huyện!',
            'MaPhuong.required' => 'Vui lòng chọn phường/xã',
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];;
        }
        $MSKH = Controller::GUID();
        $TenKH = $request->TenKH;
        $UserID = $request->UserID;
        $CMND = $request->CMND;
        $SDT = $request->SDT;
        $GioiTinh = $request->GioiTinh;
        $NgaySinh = $request->NgaySinh;
        $SoNha = $request->SoNha;
        $DiaChiGiaoHang = $request->DiaChiGiaoHang;
        $MaTinh = $request->MaTinh;
        $MaHuyen = $request->MaHuyen;
        $MaPhuong = $request->MaPhuong;
        $MaVung = $request->MaVung;
        $GhiChu = $request->GhiChu;
        $DiemTichLuy = 0;
        $TrangThai = 1;
        $created_at = Controller::get_date();
        $LastModify = Controller::get_LastModify();

        KhachhangModel::create([
            'MSKH' => $MSKH,
            'TenKH' => $TenKH,
            'UserID' => $UserID,
            'CMND' => $CMND,
            'SDT' => $SDT,
            'GioiTinh' => $GioiTinh,
            'NgaySinh' => $NgaySinh,
            'SoNha' => $SoNha,
            'DiaChiGiaoHang' => $DiaChiGiaoHang,
            'MaTinh' => $MaTinh,
            'MaHuyen' => $MaHuyen,
            'MaPhuong' => $MaPhuong,
            'MaVung' => $MaVung,
            'GhiChu' => $GhiChu,
            'DiemTichLuy' => $DiemTichLuy,
            'TrangThai' => $TrangThai,
            'created_at' => $created_at,
            'LastModify' => $LastModify
        ]);
        return ['status' => true, 'message' => 'Đã thêm khách hàng thành công!'];
    }

    public function chinhsua_khachhang($MSKH){
        $data = KhachhangModel::find($MSKH);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.khachhang.editCustomer',compact($data));
        }
        else{
            return ['status' => false, 'message' => ['Khách hàng không tồn tại!']];
        }
    }

    public function capnhat_khachhang($MSKH, Request $request){
        $validator = Validator::make($request->all(),[
            'TenKH' => 'required',
            'CMND' => 'required | unique:khachhang',
            'SDT' => 'required | unique:khachhang',
            'GioiTinh' => 'required | unique:khachhang',
            'NgaySinh' => 'required',
            'SoNha' => 'required',
            'DiaChiGiaoHang' => 'required',
            'MaTinh' => 'required',
            'MaHuyen' => 'required',
            'MaPhuong' => 'required',
        ],[
            'TenKH.required' => 'Vui lòng nhập tên khách hàng!',
            'CMND.required' => 'Vui lòng nhập số CMND!',
            'CMND.unique' => 'Số CMND đã tồn tại!',
            'SDT.required' => 'Vui lòng nhập số điện thoại khách hàng!',
            'SDT.unique' => 'Số điện thoại đã tồn tại!',
            'GioiTinh.required' => 'Vui lòng chọn giới tính!',
            'NgaySinh.required' => 'Vui lòng chọn ngày sinh!',
            'SoNha.required' => 'Vui lòng nhập số nhà!',
            'DiaChiGiaoHang.required' => 'Vui lòng nhập địa chỉ giao hàng!',
            'MaTinh.required' => 'Vui lòng chọn tỉnh/tp!',
            'MaHuyen.required' => 'Vui lòng chọn quận/huyện!',
            'MaPhuong.required' => 'Vui lòng chọn phường/xã',
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];;
        }

        $TenKH = $request->TenKH;
        $UserID = $request->UserID;
        $CMND = $request->CMND;
        $SDT = $request->SDT;
        $GioiTinh = $request->GioiTinh;
        $NgaySinh = $request->NgaySinh;
        $SoNha = $request->SoNha;
        $DiaChiGiaoHang = $request->DiaChiGiaoHang;
        $MaTinh = $request->MaTinh;
        $MaHuyen = $request->MaHuyen;
        $MaPhuong = $request->MaPhuong;
        $MaVung = $request->MaVung;
        $GhiChu = $request->GhiChu;
        $DiemTichLuy = 0;
        $TrangThai = $request->TrangThai;
        $LastModify = Controller::get_LastModify();

        KhachhangModel::where('MSKH', $MSKH)
            ->update([
                'TenKH' => $TenKH,
                'UserID' => $UserID,
                'CMND' => $CMND,
                'SDT' => $SDT,
                'GioiTinh' => $GioiTinh,
                'NgaySinh' => $NgaySinh,
                'SoNha' => $SoNha,
                'DiaChiGiaoHang' => $DiaChiGiaoHang,
                'MaTinh' => $MaTinh,
                'MaHuyen' => $MaHuyen,
                'MaPhuong' => $MaPhuong,
                'MaVung' => $MaVung,
                'GhiChu' => $GhiChu,
                'DiemTichLuy' => $DiemTichLuy,
                'TrangThai' => $TrangThai,
                'LastModify' => $LastModify
            ]);
        return ['status' => true, 'message' => 'Cập nhật thông tin khách hàng thành công!'];
    }
}
