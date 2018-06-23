<?php

namespace App\Http\Controllers;

use App\CapMaNhanVienModel;
use App\NhanvienModel;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

////********************** Hàm tạo guid **********************////
    public static function GUID(){
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public static function get_date(){
        $now = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        return $now->format('Y-m-d');
    }

    public static function get_LastModify(){
        $now = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        return $now->toDateTimeString();
    }

//    public function xuly_hanhchinh(){
//        $data = QuanHuyenModel::select('maqh','name')
////                ->whereRaw("name like N'Q%'")
//                ->where('type','Quận')
//                ->get();
////        return $data;
//        foreach ($data as $item){
//            $str = $item->name;
////            return $str;
//            $newstr = substr($str,10);
////            return $newstr;
//            QuanHuyenModel::where('maqh',$item->maqh)
//                    ->update([
//                       'name' => $newstr
//                    ]);
//        }
//        $updatedData = QuanHuyenModel::select('name')
//                        ->where('type','Huyện')
//                        ->get();
//        return $updatedData;
//    }
}
