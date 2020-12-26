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
use App\donhang;
use App\chitietdonhang;

class danhmucdonhang extends Controller
{
    public function quanlydonhang(){
        $data = Session::get('tendangnhap');
        $admin = admin::where('tendangnhap',$data)->first();
        $nhanvien = nhanvien::where('TenDangNhap',$data)->first();

        if($admin){
            $donhang = donhang::all();
            $chitietdonhang = chitietdonhang::all();
            return view('admin/donhang/viewdonhang',['donhang'=>$donhang],['chitietdonhang'=>$chitietdonhang]);
        }
        if($nhanvien){
            if($nhanvien->MaBP =='8'){
                $donhang = donhang::all();
                $chitietdonhang = chitietdonhang::all();
                return view('admin/donhang/viewdonhang',['donhang'=>$donhang],['chitietdonhang'=>$chitietdonhang]);
            }
            else{
                return redirect('admin_layout');
            }
        }
        return redirect('admin');
    }
    public function duyetdon($MaDH){
        $chitietdonhang = chitietdonhang::where('MaDH',$MaDH)->get();
        $sanpham = sanpham::all();
        foreach($chitietdonhang as $ctdh){
            foreach($sanpham as $sp){
                if($sp->MaSP==$ctdh->MaSP){
                    $tong = $sp->SoLuong - $ctdh->SoLuongMua;
                    if($tong >=0){
                        $update = DB::table('sanpham')->where('MaSP',$ctdh->MaSP)->update([
                            'SoLuong' => $sp->SoLuong - $ctdh->SoLuongMua,
                        ]);
                    }
                    else{
                        return redirect('quanlydonhang')->with('thongbaokhongthanhcong','sản phẩm không đủ để giao');
                    }                   
                }
            }
        }
        $update = DB::table('donhang')->where('MaDH',$MaDH)->update([
            'TrangThaiDH' => "1",
        ]);
        return redirect('quanlydonhang')->with('thongbao','đơn hàng đã được duyệt');
    }
    public function huydon($MaDH){
        $update = DB::table('donhang')->where('MaDH',$MaDH)->update([
            'TrangThaiDH' => "-1",
        ]);
        return redirect('quanlydonhang')->with('thongbao','húy đơn thành công');
    }
    public function giaothanhcong($MaDH){
        $update = DB::table('donhang')->where('MaDH',$MaDH)->update([
            'TrangThaiDH' => "2",
        ]);
        return redirect('quanlydonhang')->with('thongbao','Giao đơn hàng thành công');
    }
    public function huydondaduyet($MaDH){
        $chitietdonhang = chitietdonhang::where('MaDH',$MaDH)->get();
        $sanpham = sanpham::all();
        foreach($chitietdonhang as $ctdh){
            foreach($sanpham as $sp){
                if($sp->MaSP==$ctdh->MaSP){
                    $update = DB::table('sanpham')->where('MaSP',$ctdh->MaSP)->update([
                        'SoLuong' => $sp->SoLuong + $ctdh->SoLuongMua,
                    ]);                 
                }
            }
        }
        $update = DB::table('donhang')->where('MaDH',$MaDH)->update([
            'TrangThaiDH' => "-1",
        ]);
        return redirect('quanlydonhang')->with('thongbao','đơn hàng đã được hủy');
    }
    public function chitietdonhang($MaDH){
        $chitietdonhang = chitietdonhang::where('MaDH',$MaDH)->get();
        $sanpham = sanpham::all();
        return view('admin/donhang/chitietdonhang',['chitietdonhang'=>$chitietdonhang],['sanpham'=>$sanpham]);
    }
}
