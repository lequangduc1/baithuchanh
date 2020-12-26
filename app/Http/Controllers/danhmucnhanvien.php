<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\sanpham;
use App\khachhang;
use App\nhanvien;
use App\bophan;
use App\admin;

class danhmucnhanvien extends Controller
{
    public function viewnhanvien(){
        $data = Session::get('tendangnhap');
        $admin = admin::where('tendangnhap',$data)->first();
        $nhanvien = nhanvien::where('TenDangNhap',$data)->first();
        if($admin){
            $nhanvien = nhanvien::all();
            $bophan = bophan::all();
            return view('admin/nhanvien/datanhanvien',['nhanvien'=>$nhanvien],['bophan'=>$bophan]);
        }
        if($nhanvien){
            if($nhanvien->MaBP =='7'){
                $nhanvien = nhanvien::all();
                $bophan = bophan::all();
                return view('admin/nhanvien/datanhanvien',['nhanvien'=>$nhanvien],['bophan'=>$bophan]);
            }
            else{
                return redirect('admin_layout');
            }
        }
        return redirect('admin');
    }
    public function dangkinhanvien(Request $request){
        $bophan = bophan::where('TenBP',$request->bophan)->first();
        $this-> validate($request, /* check đk */
        [
            'tennhanvien' => 'required', /* mảng lỗi */
            'sdt' => 'required',
            'diachi' => 'required',
            'email' => 'required',
            'tendangnhap' => 'required',
            'matkhau' => 'required',
        ],
        [
            'tennhanvien.required' =>'Bạn chưa nhập tên nhân viên',
            'sdt.required' =>'Bạn chưa nhập số điện thoại nhân viên',
            'diachi.required' =>'Bạn chưa nhập địa chỉ nhân viên',
            'email.required' =>'Bạn chưa nhập email nhân viên',
            'tendangnhap.required' =>'Bạn chưa nhập tên đăng nhập nhân viên',
            'matkhau.required' =>'Bạn chưa nhập mật khẩu', /* mảng thông báo */
        ]);
        $nhanvien = new nhanvien; 
        $nhanvien->TenNV = $request->tennhanvien;
        $nhanvien->SDT = $request->sdt;
        $nhanvien->DiaChi = $request->diachi;
        $nhanvien->Email = $request->email;
        $nhanvien->TenDangNhap = $request->tendangnhap;
        $nhanvien->MaBP = $bophan->MaBP;
        $nhanvien->MatKhau = MD5($request->matkhau);
        $nhanvien->TrangThai = "1";

        $email = nhanvien::where('Email',$request->email)->first();
        $tendangnhap = nhanvien::where('TenDangNhap',$request->tendangnhap)->first();
        if($email)
        {
            return redirect('viewdangkinhanvien') -> with('thongbaokhongthanhcong','email đã được đăng kí'); 
        }
        if($tendangnhap)
        {
            return redirect('viewdangkinhanvien') -> with('thongbaokhongthanhcong','tên đăng nhập đã được đăng kí'); 
        }
        $nhanvien->save();
        return redirect('viewdangkinhanvien') -> with('thongbao','Thêm tài khoản thành công');
    }
    public function viewdangkinhanvien(){
        $bophan = bophan::all();
        return view('admin/nhanvien/viewnhanvien',['bophan'=>$bophan]);
    }
    public function motkNV($MaNV){
        $nhanvien = DB::table('nhanvien')->where('MaNV',$MaNV)->update([
            'TrangThai'=> "1",
        ]);
        return redirect('viewnhanvien') -> with('thongbao','Tài khoản đã được mở');
    }
    public function khoatkNV($MaNV){
        $nhanvien = DB::table('nhanvien')->where('MaNV',$MaNV)->update([
            'TrangThai'=> "0",
        ]);
        return redirect('viewnhanvien') -> with('thongbao','Tài khoản đã được khóa');
    }
}
