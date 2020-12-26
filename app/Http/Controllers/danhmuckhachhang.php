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
use App\admin;
use App\nhanvien;

class danhmuckhachhang extends Controller
{
    public function viewkhachhang(){
        $data = Session::get('tendangnhap');
        $admin = admin::where('tendangnhap',$data)->first();
        $nhanvien = nhanvien::where('TenDangNhap',$data)->first();
        if($admin){
            $khachhang =khachhang::all();
            return view('admin/khachhang/viewkhachhang',['khachhang'=>$khachhang]);
        }
        if($nhanvien){
            if($nhanvien->MaBP =='6'){
                $khachhang =khachhang::all();
                return view('admin/khachhang/viewkhachhang',['khachhang'=>$khachhang]);
            }
            else{
                return redirect('admin_layout');
            }
        }
        return redirect('admin');
        /* $user_role = Session::get('tendangnhap');
        if ($user_role) {
            $khachhang =khachhang::all();
            return view('admin/khachhang/viewkhachhang',['khachhang'=>$khachhang]);
        }
        else {
            return redirect('admin') ;
        }  */
    }
    public function motaikhoan($MaKH){
        $khachhang = DB::table('khachhang')->where('MaKH',$MaKH)->update([
            'TrangThai'=> "1",
        ]);
        return redirect('viewkhachhang') -> with('thongbao','Tài khoản đã được mở');
    }
    public function khoataikhoan($MaKH){
        $khachhang = DB::table('khachhang')->where('MaKH',$MaKH)->update([
            'TrangThai'=> "0",
        ]);
        return redirect('viewkhachhang') -> with('thongbao','Tài khoản đã được khóa');
    }
    
}
