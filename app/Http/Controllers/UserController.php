<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function user_list(Request $request){
        $where = [];
        if($request->email){
            $where[] = ['email','=',$request->email];
        }
        if($request->name){
            $where[] = ['name', '=', $request->name];
        }

        $data = User::select('UserID','name','email','TrangThai','roles.TenRole','LastModify')
                ->leftjoin('roles','roles.Roleid','=','users.roleid')
                ->where($where)
                ->get();
        return ['status' => true, 'data' => $data];
    }

    public function create_user(Request $request){
        //Validate
        $validator = Validator::make($request->all(),[
            'email' => 'required | unique:users,email',
            'password' => 'required',
        ],[
            'email.required' => 'Vui lòng điền email!',
            'email.unique:users,email' => 'Email đã tồn tại!',
            'password.required' => 'Vui lòng điền mật khẩu!',
        ]);
        if($validator->fails()){
            return ['status' => false, 'message' => [$validator->errors()->all()]];
        }
        $now = Carbon::now(new DateTimeZone('Asia/Ho_Chi_Minh'));
        $UserID = Controller::GUID();
        $email = $request->email;
        $password = md5($request->password);
        $roleid = 3;
        if($request->roleid) {
            $roleid = $request->roleid;
        }
        $token = md5($now->year . '-' . $now->month . '-' . $now->day);
        $remember_token = '';
        $TrangThai = 0;
        $LastModify = $now->toDateTimeString();

        User::create([
            'UserID' => $UserID,
            'email' => $email,
            'password' => $password,
            'roleid' => $roleid,
            'token' => $token,
            'remember_token' => $remember_token,
            'TrangThai' => $TrangThai,
            'LastModify' => $LastModify
        ]);

        return ['status' => true, 'message' => 'Đã tạo thành công tài khoản!'];
    }

    public function login_admin(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Vui lòng nhập email!',
            'password.required' => 'Vui lòng nhập mật khẩu!'
        ]);
        if($validator->fails()){
            return ['status' => true, 'message' => [$validator->errors()->all]];
        }

        $data = User::select(DB::raw("users.email,nhanvien.MaTinh,nhanvien.MSNV,nhanvien.TenNV,nhanvien.MSChuyenNganh,nhanvien.MSTrinhDo,nhanvien.MSPhongBan"))
                ->leftjoin('nhanvien','nhanvien.UserID','=','users.UserID')
                ->where('email', $request->email)
                ->where('password', md5($request->password))
                ->first();
        if($data){
            return ['status' => true, 'data' => $data];
        }
        else{
            return ['status' => false, 'message' => ['Sai email hoặc mật khẩu!']];
        }
    }
}
