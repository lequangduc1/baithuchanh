<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\sanpham;
use App\tintuc;
use App\admin;
use App\nhanvien;
class danhmuctintuc extends Controller
{
    /* public function tintuc(){
        return view('admin.data_tintuc');
    } */
    public function tintuc(){
        $data = Session::get('tendangnhap');
        $admin = admin::where('tendangnhap',$data)->first();
        $nhanvien = nhanvien::where('TenDangNhap',$data)->first();
        if($admin){
            $tintuc =tintuc::all();
            return view('/admin/tintuc/data_tintuc',['tintuc'=>$tintuc]);
        }
        if($nhanvien){
            if($nhanvien->MaBP =='1'){
                $tintuc =tintuc::all();
                return view('/admin/tintuc/data_tintuc',['tintuc'=>$tintuc]);
            }
            else{
                return redirect('admin_layout');
            }
        }
        return redirect('admin');
    }
    public function them_tintuc(Request $request){

        $this-> validate($request, /* check đk */
        [
            'tentintuc' => 'required', /* mảng lỗi */
            'tieude' => 'required',
            'hinhanh' => 'required',
            'noidung' => 'required',
        ],
        [
            'tentintuc.required' =>'Bạn chưa nhập tên tin tức',
            'tieude.required' =>'Bạn chưa nhập tiêu đề tin tức',
            'hinhanh.required' =>'Bạn chưa nhập hình ảnh tin tức',
            'noidung.required' =>'Bạn chưa nhập nội dung tin tức',/* mảng thông báo */
        ]);
        $tintuc = new tintuc; 
        $tintuc->TenTT = $request->tentintuc;
        $tintuc->TieuDe = $request->tieude;
        $tintuc->HinhAnh = $request->hinhanh;
        $tintuc->NoiDung = $request->noidung;
        $tintuc->save();
        return redirect('addtintuc') -> with('thongbao','Thêm thành công');
        
    }

    public function getsua($MaTT, Request $request){
        $tintuc = tintuc::where('MaTT',$MaTT)->first();
         return view('admin/tintuc/suatintuc',['tintuc'=>$tintuc]);
    }

    public function postsua($MaTT, Request $request){
        
        /* kiểm tra ô ko rỗng */
        if($request->tentt=="" ||  $request->tieude=="" || $request->noidung=="" )
            return redirect('addtintuc') -> with('thongbaokhongthanhcong','Sửa không thành công, không được để trống ô');
        /* kiểm tra ô ko rỗng */
        /* kiểm tra input file có rỗng ko nếu rỗng gán giá trị ảnh cũ vào */
        if($request->hinhanh==""){
            $request->hinhanh = $request->hinh;
        }
        /* kiểm tra input file có rỗng ko nếu rỗng gán giá trị ảnh cũ vào */
        $update = DB::table('tintuc')->where('MaTT',$MaTT)->update([
            'TenTT' => $request->tentt,
            'NoiDung' => $request->noidung,
            'HinhAnh' => $request->hinhanh,
            'TieuDe' => $request->tieude,
        ]);
        return redirect('addtintuc') -> with('thongbao','Sửa thành công');
    }
    public function getxoa($MaTT){      
        DB::table('tintuc')->where('MaTT',$MaTT)->delete();
        return redirect('addtintuc')->with('thongbaokhongthanhcong','Xóa thành công');
    }
}
