<?php

namespace App\Http\Controllers;

use App\NhanvienModel;
use App\TrinhdoModel;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrinhDoController extends Controller
{
    //Danh sách trình độ
    public function danhsach_trinhdo(){
        $data = TrinhdoModel::all();
        return ['status' => true, 'data' => $data];
    }

    //Tạo trình độ
    public function taomoi_trinhdo(Request $request){
        $validator = Validator::make($request->all(),[
            'TenTrinhDo' => 'required | unique:trinhdo',
            'MSTrinhDo' => 'required | unique:trinhdo',
            'TrangThai' => 'required'
        ],[
            'MSTrinhDo.required' => 'Vui lòng nhập mã trình độ!',
            'MSTrinhDo.unique' => 'Mã trình độ đã tồn tại!',
            'TenTrinhDo.required' => 'Vui lòng nhập tên trình độ!',
            'TenTrinhDo.unique' => 'Trình độ đã tồn tại!',
            'TrangThai.required' => 'Vui lòng chọn trạng thái'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];;
        }

        $now = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $MSTrinhDo = $request->MSTrinhDo;
        $TenTrinhDo = $request->TenTrinhDo;
        $TrangThai = $request->TrangThai;
        $created_at = $now->format('Y-m-d');
        $LastModify = $now->toDateTimeString();

        TrinhdoModel::create([
            'MSTrinhDo' => $MSTrinhDo,
            'TenTrinhDo' => $TenTrinhDo,
            'TrangThai' => $TrangThai,
            'created_at' => $created_at,
            'LastModify' => $LastModify
        ]);

        return ['status' => true, 'message' => 'Đã thêm trình độ!'];
    }

    //Chỉnh sửa trình độ
    public  function  chinhsua_trinhdo($MSTrinhDo){
        $data = TrinhdoModel::find($MSTrinhDo);
        if(isset($data)){
            return ['status' => true, 'data' => $data];
//            return view('admin.trinhdo.editLevel', compact('data', $data));
        }
        else{
            return ['status' => false, 'message' => ['Trình độ không tồn tại!']];
        }
    }

    //Cập nhật trình độ
    public function capnhat_trinhdo($MSTrinhDo, Request $request){
        $validator = Validator::make($request->all(),[
            'TenTrinhDo' => 'required | unique:trinhdo',
            'MSTrinhDo' => 'required | unique:trinhdo',
            'TrangThai' => 'required'
        ],[
            'MSTrinhDo.required' => 'Vui lòng nhập mã trình độ!',
            'MSTrinhDo.unique' => 'Mã trình độ đã tồn tại!',
            'TenTrinhDo.required' => 'Vui lòng nhập tên trình độ!',
            'TenTrinhDo.unique' => 'Trình độ đã tồn tại!',
            'TrangThai.required' => 'Trạng thái không được để trống!'
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => $validator->errors()->all()];;
        }

        $MSTrinhDoNew = $request->MSTrinhDo;
        $TenTrinhDo = $request->TenTrinhDo;
        $LastModify = Controller::get_LastModify();
        $TrangThai = $request->TrangThai;

        TrinhdoModel::where('MSTrinhDo', $MSTrinhDo)
            ->update([
                'MSTrinhDo' => $MSTrinhDoNew,
                'TenTrinhDo' => $TenTrinhDo,
                'LastModify' => $LastModify,
                'TrangThai' => $TrangThai
            ]);

        NhanvienModel::where('MSTrinhDo',$MSTrinhDo)
            ->update([
                'MSTrinhDo' => $MSTrinhDoNew
            ]);

        return ['status' => true, 'message' => 'Cập nhật trình độ thành công!'];
    }
}
