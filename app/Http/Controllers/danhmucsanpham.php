<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;/* tra vef trang gi do */

use Illuminate\Database\Eloquent\ModelNotFoundException;
/* use Illuminate\Foundation\Http\FormRequest; */
use App\sanpham;
use App\hangxe;
use App\admin;
use App\nhanvien;
use App\chitietgiohang;
use App\chitietdonhang;
session_start();

class danhmucsanpham extends Controller
{
    function __construct(){
        $hangxe =hangxe::all(); /* share các biến qua view */
        $sanpham =sanpham::all();
        view()->share('hangxe',$hangxe);
        view()->share('sanpham',$sanpham);
    }

    public function sanpham(){
        $chitietdonhang = chitietdonhang::all();
        /* $sanpham =sanpham::all();
        foreach($sanpham as $sp){
            echo $sp->MaSP."<br>";
            foreach($chitietdonhang as $ctdh){
                
                if($sp->MaSP == $ctdh->MaSP){
                    echo $sp->MaSP."<br>";
                    break;
                    
                }
            }
            exit;
        }
        exit; */
        $data = Session::get('tendangnhap');
        $admin = admin::where('tendangnhap',$data)->first();
        $nhanvien = nhanvien::where('TenDangNhap',$data)->first();
        if($admin){
            $sanpham =sanpham::all();
            return view('admin/sanpham/data_sanpham',['sanpham'=>$sanpham],['chitietdonhang'=>$chitietdonhang]);
        }
        if($nhanvien){
            if($nhanvien->MaBP =='4'){
                $sanpham =sanpham::all();
            return view('admin/sanpham/data_sanpham',['sanpham'=>$sanpham],['chitietdonhang'=>$chitietdonhang]);
            }
            else{
                return redirect('admin_layout');
            }
        }
        return redirect('admin');
    }
    public function save_data_sanpham(Request $request){

        $this-> validate($request, /* check đk */
        [
            'tensanpham' => 'required', /* mảng lỗi */
            'gia' => 'required',
            'soluong' => 'required',
            'hangxe' => 'required',
            'hinhanh' => 'required',
            'mota' => 'required',
        ],
        [
            'tensanpham.required' =>'Bạn chưa nhập tên sản phẩm',
            'gia.required' =>'Bạn chưa nhập giá sản phẩm',
            'soluong.required' =>'Bạn chưa nhập số lượng sản phẩm',
            'hangxe.required' =>'Bạn chưa nhập hãng xe',
            'hinhanh.required' =>'Bạn chưa nhập hình ảnh sản phẩm',
            'mota.required' =>'Bạn chưa nhập mô tả sản phẩm', /* mảng thông báo */
        ]);
        $sanpham = new sanpham; 
        $sanpham->TenSP = $request->tensanpham;
        $sanpham->NoiDungMoTa = $request->mota;

        $sanpham->HinhAnh = $request->hinhanh;
        if(!is_numeric($request->gia)){
            return redirect('addsanpham') -> with('thongbao','Thêm thất bại Giá phải nhập số');
        }
        $sanpham->Gia = $request->gia;
        if(!is_numeric($request->soluong)){
            return redirect('addsanpham') -> with('thongbao','Thêm thất bại Số lượng phải nhập số');
        }
        $sanpham->SoLuong = $request->soluong;
        $sanpham->HangXe = $request->hangxe;
        $sanpham->save();
        return redirect('addsanpham') -> with('thongbao','Thêm thành công');
        
    }
    public function getsua($MaSP, Request $request){
        $sanpham = sanpham::where('MaSP',$MaSP)->first();
         return view('admin/sanpham/suasanpham',['sanpham'=>$sanpham]);
    }
    public function postsua($MaSP, Request $request){
        
        /* kiểm tra ô ko rỗng */
        if($request->tensanpham=="" ||  $request->mota=="" || $request->gia=="" || $request->soluong=="" || $request->hangxe=="")
            return redirect('addsanpham') -> with('thongbaokhongthanhcong','Sửa không thành công, không được để trống ô');
        /* kiểm tra ô ko rỗng */
        /* kiểm tra input file có rỗng ko nếu rỗng gán giá trị ảnh cũ vào */
        if($request->hinhanh==""){
            $request->hinhanh = $request->hinh;
        }
        /* kiểm tra input file có rỗng ko nếu rỗng gán giá trị ảnh cũ vào */
        $update = DB::table('sanpham')->where('MaSP',$MaSP)->update([
            'TenSP' => $request->tensanpham,
            'NoiDungMoTa' => $request->mota,
            'HinhAnh' => $request->hinhanh,
            'Gia' => $request->gia,
            'SoLuong' => $request->soluong,
            'HangXe' => $request->hangxe,
        ]);
        return redirect('addsanpham') -> with('thongbao','Sửa thành công');
    }
    public function getxoa($MaSP){
        $chitietgiohang = chitietgiohang::where('MaSP',$MaSP)->first();
        $chitietdonhang = chitietdonhang::where('MaSP',$MaSP)->first();
        /* echo "giohang: " .$chitietgiohang ."<br>";
        echo "donhang: " .$chitietdonhang ."<br>"; */
        if($chitietdonhang!=""){
            return redirect('addsanpham')->with('thongbaokhongthanhcong','Xóa không thành công do trong đơn hàng có sản phẩm này');
        }
        else{
            if($chitietgiohang!=""){
                return redirect('addsanpham')->with('thongbaokhongthanhcong','Xóa không thành công do trong giỏ hàng có sản phẩm này');
            }
        }     
        DB::table('sanpham')->where('MaSP',$MaSP)->delete();
        return redirect('addsanpham')->with('thongbao','Xóa thành công');
    }
    /* tìm kiếm sản phảm */
    public function timkiemsp_admin(Request $request){
        $key = $request->timkiem;
        $sanpham = sanpham::where('TenSP','LIKE','%'.$key.'%')->orwhere('Gia',$key)->get();
        return view('admin/sanpham/data_sanpham',['sanpham'=>$sanpham]);
    }
    /* tìm kiếm sản phảm */

}
