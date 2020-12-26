@extends('admin_layout')
@section('admin_data')
    <table class="table">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> Tất cả khách hàng</div>
        <thead>
            <tr>
            <th scope="col">Mã khách hàng</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Địa chi</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Khóa/Mở TK</th>
            <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            @foreach($khachhang as $kh)
            <tr>
            <td>{{$kh->MaKH}}</td>
            <td>{{$kh->TenKH}}</td>
            <td>{{$kh->DiaChi}}</td>
            <td>{{$kh->Email}}</td>
            <td>{{$kh->SDT}}</td>
            <td>
                <?php
                    if($kh->TrangThai=="1")
                        echo "TK đang mở";
                    else echo "TK bị khóa";
                ?>
            </td>
            <td>
                @if($kh->TrangThai=="1")
                    <a href="khoatk/{{$kh->MaKH}}" ><i class="fa fa-lock"></i></a>
                @endif
                @if($kh->TrangThai!="1")
                    <a href="motk/{{$kh->MaKH}}" ><i class="fa fa-lock-open"></i></a>
                @endif 
            </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection
