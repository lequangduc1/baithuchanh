@extends('admin_layout')
@section('admin_data')
    <a href="{{URL::to('/viewdangkinhanvien')}}">đăng kí nhân viên</a>
    <table class="table">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> Tất cả nhân viên</div>
        <thead>
            <tr>
            <th scope="col">Mã nhân viên</th>
            <th scope="col">Tên nhân viên</th>
            <th scope="col">Địa chi</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Bộ Phận</th>
            <th scope="col">Tên đăng nhập</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Khóa/Mở TK</th>
            <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            @foreach($nhanvien as $nv)
            <tr>
            <td>{{$nv->MaNV}}</td>
            <td>{{$nv->TenNV}}</td>
            <td>{{$nv->DiaChi}}</td>
            <td>{{$nv->Email}}</td>
            <td>{{$nv->SDT}}</td>
            <td>
                <?php
                    foreach($bophan as $bp){
                        if($nv->MaBP==$bp->MaBP)
                            echo $bp->TenBP;
                    }
                ?>
            </td>
            <td>{{$nv->TenDangNhap}}</td>
            <td>
                <?php
                    if($nv->TrangThai=="1")
                        echo "TK đang mở";
                    else echo "TK bị khóa";
                ?>
            </td>
            <td>
                @if($nv->TrangThai=="1")
                    <a href="khoatkNV/{{$nv->MaNV}}" ><i class="fa fa-lock"></i></a>
                @endif
                @if($nv->TrangThai!="1")
                    <a href="motkNV/{{$nv->MaNV}}" ><i class="fa fa-lock-open"></i></a>
                @endif 
            </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
@endsection
