<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect; /* tra vef trang gi do */
session_start();
use App\admin;
use App\nhanvien;

class AdminController extends Controller
{
    public function index(){
        return view('admin_login');
    }
    /* show view dashboard trong thư mục admin */
    public function show_adminlayout(){
        return view('admin.dashboard');
    }

    /* xét điều kiện trong form với db nếu đúng xuất ra view admin.dashboard else thì vẩn ở trang login */

    public function dashboard(Request $request){
        $tendangnhap = $request->tendangnhap;
        $matkhau = md5($request->matkhau);

        $admin =DB::table('admin')-> where('tendangnhap',$tendangnhap)->where('matkhau',$matkhau)->first();
        $nhanvien =DB::table('nhanvien')-> where('TenDangNhap',$tendangnhap)->where('MatKhau',$matkhau)->first();
        if(isset($admin)){ 
            Session::put('tendangnhap',$admin->tendangnhap);
            return view('admin.dashboard',[$admin],[$nhanvien]);
        }
        if(isset($nhanvien)){ 
            if($nhanvien->TrangThai =="1"){
                Session::put('tendangnhap',$nhanvien->TenDangNhap);
                return view('admin.dashboard',[$admin],[$nhanvien]);
            }
            else{
                Session::put('mes_loi','Tài khoản này đã bị khóa');
                return view('admin_login');
            }
        }
        Session::put('mes_loi','Mật khẩu hoặc tên đăng nhập sai, xin nhập lại');
        return view('admin_login');
    }

    public function logout(){
        Session::put('tendangnhap',null);
        return view('admin_login');
    }
    public function doimatkhau_admin(){
        $data = Session::get('tendangnhap');
        $admin = admin::where('tendangnhap',$data)->first();
        $nhanvien = nhanvien::where('TenDangNhap',$data)->first();
        if($admin == "" && $nhanvien =="")
            return redirect('admin');
        return view('admin/doimatkhau_admin');
    }


    public function postdoimatkhau_admin(Request $request){
        $taikhoan = Session::get('tendangnhap');  
        $admin = admin::where('tendangnhap',$taikhoan)->first();
        $nhanvien = nhanvien::where('TenDangNhap',$taikhoan)->first();
        if($request->matkhaucu=="" || $request->matkhaumoi=="" || $request->matkhaumoi2==""){
            return redirect('doimatkhau_admin') -> with('thongbaokhongthanhcong','không được để trống ô');
        }
        else
        {
            if($admin){
                if(MD5($request->matkhaucu) != $admin->matkhau)
                    return redirect('doimatkhau_admin') -> with('thongbaokhongthanhcong','mật khẩu cũ không đúng');
                else{
                    if($request->matkhaumoi != $request->matkhaumoi2)
                        return redirect('doimatkhau_admin') -> with('thongbaokhongthanhcong','Nhập lại mật khẩu mới không đúng');
                }
            }
            else
            {
                if(MD5($request->matkhaucu) != $nhanvien->MatKhau)
                    return redirect('doimatkhau_admin') -> with('thongbaokhongthanhcong','mật khẩu cũ không đúng');
                else{
                    if($request->matkhaumoi != $request->matkhaumoi2)
                        return redirect('doimatkhau_admin') -> with('thongbaokhongthanhcong','Nhập lại mật khẩu mới không đúng');
                    } 
            }
        }
        if($admin){
            $update = DB::table('admin')->where('IDAdmin',$admin->IDAdmin)->update([
                'matkhau' => MD5($request->matkhaumoi),
            ]);
        }
        if($nhanvien){
            $update = DB::table('nhanvien')->where('MaNV',$nhanvien->MaNV)->update([
                'MatKhau' => MD5($request->matkhaumoi),
            ]);
        }
        
        return redirect('admin');
    }
}
