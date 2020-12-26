<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

/* frontend */
    /* trả view trang chủ cho người dùng */
        Route::get('/','TrangChu_frontend@trangchu'); 
        Route::get('/trang_chu','TrangChu_frontend@trangchu'); 
    /* trả view trang chủ cho người dùng */

    /* trang tin tức */
        Route::get('/trang_tintuc','TrangChu_frontend@trangtintuc'); 
    /* trang tin tức */
    /* đăng nhập - đăng kí - đổi mật khẩu */
        Route::get('/login','TrangChu_frontend@view_login');
        Route::get('/login_dangki','TrangChu_frontend@view_logindangki');
        Route::post('/postlogin_dangki','TrangChu_frontend@view_postlogindangki');
        Route::get('/getlogin_dangnhap','TrangChu_frontend@view_getlogindangnhap');
        Route::get('/getlogin_dangxuat','TrangChu_frontend@view_getlogindangxuat');
        Route::get('/doimatkhau','TrangChu_frontend@viewdoimatkhau');
        Route::post('/postdoimatkhau','TrangChu_frontend@postdoimatkhau');
    /* đăng nhập - đăng kí - đổi matạ khẩu */
    /* show sản phẩm */
        Route::get('/sanpham_loai/{id}','TrangChu_frontend@showsanphamid');
    /* show sản phẩm */
    /* chi tiết sản phẩm */
        Route::get('/chitietsanpham/{MaSP}','TrangChu_frontend@viewchitietsanpham');
    /* chi tiết sản phẩm */
    /* Giỏ hàng */
        Route::get('/giohang','TrangChu_frontend@viewgiohang');
        Route::get('/themvaogiohang/{id}','TrangChu_frontend@themvaogiohang');
        Route::get('/tangsoluong/{id}','TrangChu_frontend@tangsoluong');
        Route::get('/giamsoluong/{id}','TrangChu_frontend@giamsoluong');
        Route::get('/xoa_sp_gh/{id}','TrangChu_frontend@xoa');
    /* Giỏ hàng */
    /* tìm kiếm sản phẩm */
        Route::get('/timkiemsp',['as'=>'timkiemsp','uses'=>'TrangChu_frontend@timkiemsp']);
    /* tìm kiếm sản phẩm */
    /* đơn hàng */
        Route::get('/viewdonhang','TrangChu_frontend@viewdonhang');
        Route::post('/post_xacnhandonhang','TrangChu_frontend@post_xacnhandonhang');
    /* đơn hàng */
/* frontend */

/* backend */
    Route::get('/admin','AdminController@index');
    Route::get('/admin_layout','AdminController@show_adminlayout');
    Route::get('/logout','AdminController@logout');
    Route::post('/admin-dashboard','AdminController@dashboard');
    Route::get('/doimatkhau_admin','AdminController@doimatkhau_admin');
    Route::post('/postdoimatkhau_admin','AdminController@postdoimatkhau_admin');
    /* danh mục sản phẩm */

        Route::get('/addsanpham','danhmucsanpham@sanpham');
        Route::post('/save-data-sanpham','danhmucsanpham@save_data_sanpham');
        Route::get('/sua/{id}','danhmucsanpham@getsua');
        Route::post('/suasanpham/{id}','danhmucsanpham@postsua');
        Route::get('/xoasanpham/{id}','danhmucsanpham@getxoa');
        /* tìm kiếm sản phẩm */
            Route::get('/timkiemsp_admin',['as'=>'timkiemsp_admin','uses'=>'danhmucsanpham@timkiemsp_admin']);
        /* tìm kiếm sản phẩm */
    /* danh mục sản phẩm */

    /* danh mục tin tức */

        Route::get('/addtintuc','danhmuctintuc@tintuc');
        Route::post('/them_tinntuc','danhmuctintuc@them_tintuc');
        Route::get('/viewsua/{id}','danhmuctintuc@getsua');
        Route::post('/suatintuc/{id}','danhmuctintuc@postsua');
        Route::get('/xoatintuc/{id}','danhmuctintuc@getxoa');
        
    /* danh mục tin tức */

    /* danh mục khách hàng */
        Route::get('/viewkhachhang','danhmuckhachhang@viewkhachhang');
        Route::get('/motk/{id}','danhmuckhachhang@motaikhoan');
        Route::get('/khoatk/{id}','danhmuckhachhang@khoataikhoan');
    /* danh mục khách hàng */

    /* quản lý nhân viên */
        Route::get('/viewnhanvien','danhmucnhanvien@viewnhanvien');
        Route::post('/dangkinhanvien','danhmucnhanvien@dangkinhanvien');
        Route::get('/viewdangkinhanvien','danhmucnhanvien@viewdangkinhanvien');
        Route::get('/khoatkNV/{id}','danhmucnhanvien@khoatkNV');
        Route::get('/motkNV/{id}','danhmucnhanvien@motkNV');
    /* quản lý nhân viên */
    /* Quản lý đơn hàng */
        Route::get('/quanlydonhang','danhmucdonhang@quanlydonhang');
        Route::get('/duyetdon/{id}','danhmucdonhang@duyetdon');
        Route::get('/huydon/{id}','danhmucdonhang@huydon');
        Route::get('/giaothanhcong/{id}','danhmucdonhang@giaothanhcong');
        Route::get('/huydondaduyet/{id}','danhmucdonhang@huydondaduyet');
        Route::get('/chitietdonhang/{id}','danhmucdonhang@chitietdonhang');
    /* Quản lý đơn hàng */
/* backend */


