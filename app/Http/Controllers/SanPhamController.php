<?php

namespace App\Http\Controllers;

use App\SanphamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SanPhamController extends Controller
{
    //Danh sách sản phẩm
    public function danhsach_sanpham(Request $request){
        $where = [];
        if($request->MaMac){
            $where[] = ['MaMac','=',$request->MaMac];
        }
        if($request->TenHH){
            $where[] = ['TenSP','LIKE','%'.$request->TenSP.'%'];
        }
        if($request->MSSP){
            $where[] = ['MSSP','=',$request->MSSP];
        }
        $data = SanphamModel::where($where)
            ->offset($request->page * 20)
            ->limit(20)
            ->get();
        return ['status' => true, 'data' => $data];
    }

    //Tạo mới sản phẩm
    public function taomoi_sanpham(Request $request){
        $validator = Validator::make($request->all(),[
            'MaMac' => 'required | unique:sanpham',
            'TenSP' => 'required | unique:sanpham',
            'SoLo' => 'required | unique:sanpham',
            'MoTa' => 'required',
            'PathHinhAnh' => 'required | unique:sanpham',
            'DVT' => 'required',
            'MSNCC' => 'required',
            'MSDanhMuc' => 'required',
            'GiaNhap' => 'required',
            'GiaNhapVAT' => 'required',
            'GiaBanLe' => 'required',
            'GiaBanSi' => 'required',
            'TrongLuong' => 'required',
            'ThoiGianBaoHanh' => 'required',
            'NuocSanXuat' => 'required',
            'DiemTichLuy' => 'required',
            'SoDiemDuocDoi' => 'required',
            'PhanTramCK' => 'required'
        ],[
            'MaMac.required' => 'Vui lòng nhập mã MAC!',
            'MaMac.unique' => 'Mã MAC đã tồn tại!',
            'TenSP.required' => 'Vui lòng nhập tên sản phẩm!',
            'TenSP.unique' => 'Tên sản phẩm đã tồn tại!',
            'SoLo.required' => 'Vui lòng nhập số lô!',
            'SoLo.unique' => 'Số lô đã tồn tại!',
            'MoTa.required' => 'Vui lòng nhập mô tả',
            'PathHinhAnh.required' => 'Vui lòng chọn hình ảnh!',
            'PathHinhAnh.unique' => 'Hình ảnh đã tồn tại!',
            'DVT.required' => 'Vui lòng nhập đơn vị tính!',
            'MSNCC.required' => 'Vui lòng chọn nhà cung cấp!',
            'MSDanhMuc.required' => 'Vui lòng chọn danh mục!',
            'GiaNhap.required' => 'Vui lòng nhập giá nhập của sản phẩm!',
            'GiaNhapVAT.required' => 'Vui lòng nhập giá nhập có thuế của sản phẩm!',
            'GiaBanLe.required' => 'Vui lòng nhập giá bán lẻ',
            'GiaBanSi.required' => 'Vui lòng nhập giá bán sỉ',
            'TrongLuong.required' => 'Vui lòng nhập trọng lượng!',
            'ThoiGianBaoHanh.required' => 'Vui lòng nhập thời gian bảo hành',
            'NuocSanXuat.required' => 'Vui lòng nhập tên nước sản xuất',
            'DiemTichLuy.required' => 'Vui lòng nhập điểm tích lũy cho sản phẩm',
            'SoDiemDuocDoi.required' => 'Vui lòng nhập số điểm được đổi!',
            'PhanTramCK.required' => 'Vui lòng nhập phần trăm chiết khấu!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];;
        }
        
    }

}
