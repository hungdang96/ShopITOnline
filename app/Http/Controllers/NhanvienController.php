<?php

namespace App\Http\Controllers;

use App\CapMaNhanVienModel;
use App\NhanvienModel;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NhanvienController extends Controller
{
    public function MaNV_Generator($MSChucVu){
        $prefixID = $MSChucVu;
        $ID = CapMaNhanVienModel::all()[0];
        $IDStaff = (int)$ID->MaStaff + 1;
        $numberZero = 6 - strlen($IDStaff);
        while ($numberZero > 0) {
            $IDStaff = "0".$IDStaff;
            $numberZero--;
        }
        $FullIDStaff = $prefixID.'-'.$IDStaff;
        return ['IDStaff' => $IDStaff, 'FullIDStaff' => $FullIDStaff];
    }

    public function Update_MaNV($IDStaff){
        CapMaNhanVienModel::where('id', 1)
            ->update([
                'MaStaff' => $IDStaff
            ]);
    }

    public function danhsach_nhanvien(Request $request){
        $where = [];
        $where[] = ['MSCN', '=', $request->MSCN];
        if($request->MaNV){
            $where[] = ['MaNV', '=', $request->MaNV];
        }
        if($request->TenNV){
            $where[] = ['TenNV', 'LIKE', '%'.$request->TenNV.'%'];
        }
        if($request->DienThoai){
            $where[] = ['DienThoai', '=', $request->DienThoai];
        }
        if($request->MSPhongBan){
            $where[] = ['MSPhongBan', '=', $request->MSPhongBan];
        }

        $data = NhanvienModel::select(DB::raw("Nhanvien.*, chuyennganh.TenChuyenNganh, trinhdo.TenTrinhDo, phongban.TenPhongBan, chucvu.TenChucVu"))
                ->leftjoin('chuyennganh','chuyennganh.MSChuyenNganh','=','nhanvien.MSChuyenNganh')
                ->leftjoin('trinhdo','trinhdo.MSTrinhDo','=','nhanvien.MSTrinhDo')
                ->leftjoin('phongban','phongban.MSPhongBan','=','nhanvien.MSPhongBan')
                ->leftjoin('chucvu','chucvu.MSChucVu','=','nhanvien.MSChucVu')
                ->where($where)
                ->get();

        return ['status' => true, 'data' => $data];
//        return view('admin.stafflist',compact('data',$data));
    }

    public function taomoi_nhanvien(Request $request){
        $validator = Validator::make($request->all(),[
            'TenNV' => 'required',
            'GioiTinh' => 'required',
            'DienThoai' => 'required | unique:nhanvien',
            'NgaySinh' => 'required',
            'CMND' => 'required | unique:nhanvien',
            'HoKhau' => 'required',
            'NoiOHienTai' => 'required',
            'MaTinh' => 'required',
            'MSChuyenNganh' => 'required',
            'MSTrinhDo' => 'required',
            'MSPhongBan' => 'required',
            'MSChucVu' => 'required',
            'MSCN' => 'required',
            'NgayTuyenDung' => 'required'
        ],[
            'TenNV.required' => 'Vui lòng nhập vào họ tên nhân viên!',
            'GioiTinh.required' => 'Vui lòng chọn giới tính!',
            'DienThoai.required' => 'Vui lòng nhập số điện thoại nhân viên!',
            'DienThoai.unique' => 'Số điện thoại đã tồn tại!',
            'NgaySinh.required' => 'Vui long nhập ngày sinh nhân viên!',
            'CMND.required' => 'Vui lòng nhập số CMND!',
            'CMND.unique' => 'Số CMND bị trùng!',
            'HoKhau.required' => 'Vui lòng nhập thông tin hộ khẩu!',
            'NoiOHienTai.required' => 'Vui lòng nhập nơi ở hiện tại của nhân viên!',
            'MaTinh.required' => 'Vui lòng chọn tỉnh/tp!',
            'MSChuyenNganh.required' => 'Vui lòng chọn chuyên ngành!',
            'MSTrinhDo.required' => 'Vui lòng chọn trình độ!',
            'MSPhongBan.required' => 'Vui lòng chọn phòng ban!',
            'MSChucVu.required' => 'Vui lòng chọn phòng chức vụ!',
            'MSCN.required' => 'Mã số chi nhánh không được để trống!',
            'NgayTuyenDung.required' => 'Vui lòng nhập ngày tuyển dụng!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => [$validator->errors()->all()]];
        }

        $now = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $MSChucVu = $request->MSChucVu;
        $IDNV = Controller::GUID();
        $MaNV = $this->MaNV_Generator($MSChucVu);
        $TenNV = $request->TenNV;
        $UserID = $request->UserID;
        if($UserID == null){
            $UserID = '';
        }
        $GioiTinh = $request->GioiTinh;
        $DienThoai = $request->DienThoai;
        $NgaySinh = $request->NgaySinh;
        $CMND = $request->CMND;
        $HoKhau = $request->HoKhau;
        $NoiOHienTai = $request->NoiOHienTai;
        $MaTinh = $request->MaTinh;
        $MSChuyenNganh = $request->MSChuyenNganh;
        $MSTrinhDo = $request->MSTrinhDo;
        $MSPhongBan = $request->MSPhongBan;
        $MSCN = $request->MSCN;
        $LuongCB = $request->LuongCB;
        $PhuCap = $request->PhuCap;
        $TrangThai = $request->TrangThai;
        $NgayTuyenDung = $request->NgayTuyenDung;
        $LastModify = $now->toDateTimeString();

        NhanvienModel::create([
            'IDNV' => $IDNV,
            'MaNV' => $MaNV['FullIDStaff'],
            'TenNV' => $TenNV,
            'UserID' => $UserID,
            'GioiTinh' => $GioiTinh,
            'DienThoai' => $DienThoai,
            'NgaySinh' => $NgaySinh,
            'CMND' => $CMND,
            'HoKhau' => $HoKhau,
            'NoiOHienTai' => $NoiOHienTai,
            'MaTinh' => $MaTinh,
            'MSChuyenNganh' => $MSChuyenNganh,
            'MSTrinhDo' => $MSTrinhDo,
            'MSPhongBan' => $MSPhongBan,
            'MSChucVu' => $MSChucVu,
            'MSCN' => $MSCN,
            'LuongCB' => $LuongCB,
            'PhuCap' => $PhuCap,
            'NgayTuyenDung' => $NgayTuyenDung,
            'LastModify' => $LastModify,
            'TrangThai' => $TrangThai
        ]);
        //Update ID Staff
        $this->Update_MaNV($MaNV['IDStaff']);
        return ['status' => true, 'message' => 'Tạo nhân viên thành công!'];
    }

    public function chinhsua_nhanvien($IDNV){
        $data =  NhanvienModel::find($IDNV);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.nhanvien.chinhsuanv',compact('data',$data));
        }
        else{
            return ['status' => false, 'message' => ['Không tìm thấy nhân viên!']];
        }
    }

    public function capnhat_nhanvien($IDNV, Request $request){
        $validator = Validator::make($request->all(),[
            'TenNV' => 'required',
            'GioiTinh' => 'required',
            'DienThoai' => 'required | unique:nhanvien',
            'NgaySinh' => 'required',
            'CMND' => 'required | unique:nhanvien',
            'HoKhau' => 'required',
            'NoiOHienTai' => 'required',
            'MaTinh' => 'required',
            'MSChuyenNganh' => 'required',
            'MSTrinhDo' => 'required',
            'MSPhongBan' => 'required',
            'MSChucVu' => 'required',
            'MSCN' => 'required',
        ],[
            'TenNV.required' => 'Vui lòng nhập vào họ tên nhân viên!',
            'GioiTinh.required' => 'Vui lòng chọn giới tính!',
            'DienThoai.required' => 'Vui lòng nhập số điện thoại nhân viên!',
            'DienThoai.unique' => 'Số điện thoại đã tồn tại!',
            'NgaySinh.required' => 'Vui long nhập ngày sinh nhân viên!',
            'CMND.required' => 'Vui lòng nhập số CMND!',
            'CMND.unique' => 'Số CMND bị trùng!',
            'HoKhau.required' => 'Vui lòng nhập thông tin hộ khẩu!',
            'NoiOHienTai.required' => 'Vui lòng nhập nơi ở hiện tại của nhân viên!',
            'MaTinh.required' => 'Vui lòng chọn tỉnh/tp!',
            'MSChuyenNganh.required' => 'Vui lòng chọn chuyên ngành!',
            'MSTrinhDo.required' => 'Vui lòng chọn trình độ!',
            'MSPhongBan.required' => 'Vui lòng chọn phòng ban!',
            'MSChucVu.required' => 'Vui lòng chọn phòng chức vụ!',
            'MSCN.required' => 'Mã số chi nhánh không được để trống!',
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => [$validator->errors()->all()]];
        }

        $now = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $MSChucVu = $request->MSChucVu;
        $MaNV = $request->MaNV;
        $TenNV = $request->TenNV;
        $UserID = $request->UserID;
        $GioiTinh = $request->GioiTinh;
        $DienThoai = $request->DienThoai;
        $NgaySinh = $request->NgaySinh;
        $CMND = $request->CMND;
        $HoKhau = $request->HoKhau;
        $NoiOHienTai = $request->NoiOHienTai;
        $MaTinh = $request->MaTinh;
        $MSChuyenNganh = $request->MSChuyenNganh;
        $MSTrinhDo = $request->MSTrinhDo;
        $MSPhongBan = $request->MSPhongBan;
        $MSCN = $request->MSCN;
        $LuongCB = $request->LuongCB;
        $PhuCap = $request->PhuCap;
        $TrangThai = $request->TrangThai;
        $LastModify = $now->toDateTimeString();

        NhanvienModel::where('IDNV',$IDNV)
        ->update([
            'MaNV' => $MaNV,
            'TenNV' => $TenNV,
            'UserID' => $UserID,
            'GioiTinh' => $GioiTinh,
            'DienThoai' => $DienThoai,
            'NgaySinh' => $NgaySinh,
            'CMND' => $CMND,
            'HoKhau' => $HoKhau,
            'NoiOHienTai' => $NoiOHienTai,
            'MaTinh' => $MaTinh,
            'MSChuyenNganh' => $MSChuyenNganh,
            'MSTrinhDo' => $MSTrinhDo,
            'MSPhongBan' => $MSPhongBan,
            'MSChucVu' => $MSChucVu,
            'MSCN' => $MSCN,
            'LuongCB' => $LuongCB,
            'PhuCap' => $PhuCap,
            'LastModify' => $LastModify,
            'TrangThai' => $TrangThai
        ]);
        return ['status' => true, 'message' => 'Cập nhật nhân viên thành công!'];
    }
}
