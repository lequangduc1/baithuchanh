@extends('admin_layout')
@section('admin_data')
    <table class="table">
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        @if(session('thongbaokhongthanhcong'))
            <div class="alert alert-danger">
                {{session('thongbaokhongthanhcong')}}
            </div>
        @endif
        <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> các đơn hàng chưa được duyệt</div>
        <thead>
            <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Email người đặt hàng</th>
            <th scope="col">Tên người nhận</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Ngày Giao Hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tổng sản phẩm</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Giao hàng thành công / Hủy đơn</th>
            <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            
            @foreach($donhang as $dh)
                @if($dh->TrangThaiDH=="0")
                    <tr>
                    <td><a href="/doanthunghiem/chitietdonhang/{{$dh->MaDH}}">{{$dh->MaDH}}</a></td>
                    <td>{{$dh->EmailNguoiDat}}</td>
                    <td>{{$dh->TenNguoiNhan}}</td>
                    <td>{{$dh->DiaChiNguoiNhan}}</td>
                    <td>{{$dh->SDTNguoiNhan}}</td>
                    <td>{{$dh->NgayGiaoHang}}</td>
                    <td>{{$dh->NgayGioDatHang}}</td>
                    <td><?php
                        $tongsp =0;
                        foreach($chitietdonhang as $ctdh){
                            if($dh->MaDH == $ctdh->MaDH)
                                $tongsp = $tongsp + $ctdh->SoLuongMua;
                        }
                        echo $tongsp;
                    ?></td>
                    <td><?php echo number_format($dh->TongTien, 0) . " VNĐ"?></td>
                    <td>
                        <?php
                        
                            if($dh->TrangThaiDH=="0")
                                echo "Đơn chưa được giao";
                        ?>
                    </td>
                    <td>
                        <a href="duyetdon/{{$dh->MaDH}}" ><i class="fa fa-check-square" style="font-size:30px;margin-left:10px;"></i></a>
                        <a href="huydon/{{$dh->MaDH}}" ><i class="fa fa-times" style="font-size:30px;margin-left:10px;"></i></a>
                    </td>
                    </tr>
                @endif
            @endforeach
            
        </tbody>
        
    </table>
    <!-- các đơn hàng đã được duyệt -->
    <table class="table">
        <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> các đơn hàng đã được duyệt</div>
        <thead>
            <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Email người đặt hàng</th>
            <th scope="col">Tên người nhận</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Ngày Giao Hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Giao thành công / Hủy đơn</th>

            </tr>
        </thead>
        <tbody>
            @foreach($donhang as $dh)
                @if($dh->TrangThaiDH=="1")
                    <tr>
                    <td><a href="/doanthunghiem/chitietdonhang/{{$dh->MaDH}}">{{$dh->MaDH}}</a></td>
                    <td>{{$dh->EmailNguoiDat}}</td>
                    <td>{{$dh->TenNguoiNhan}}</td>
                    <td>{{$dh->DiaChiNguoiNhan}}</td>
                    <td>{{$dh->SDTNguoiNhan}}</td>
                    <td>{{$dh->NgayGiaoHang}}</td>
                    <td>{{$dh->NgayGioDatHang}}</td>
                    <td><?php echo number_format($dh->TongTien, 0) . " VNĐ"?></td>
                    <td>
                        <?php
                            if($dh->TrangThaiDH=="1")
                                echo "Đơn đang được giao";
                        ?>
                    </td>
                    <td>
                        <a href="giaothanhcong/{{$dh->MaDH}}" ><i class="fa fa-check-square" style="font-size:30px;margin-left:10px;"></i></a>
                        <a href="huydondaduyet/{{$dh->MaDH}}" ><i class="fa fa-times" style="font-size:30px;margin-left:10px;"></i></a>
                    </td>
                    </tr>
                @endif
            @endforeach
            
        </tbody>
        
    </table>

    <!-- đơn hàng đã giao -->
    <table class="table">
        <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> các đơn hàng đã giao</div>
        <thead>
            <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Email người đặt hàng</th>
            <th scope="col">Tên người nhận</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Ngày Giao Hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            @foreach($donhang as $dh)
                @if($dh->TrangThaiDH=="2")
                    <tr>
                    <td><a href="/doanthunghiem/chitietdonhang/{{$dh->MaDH}}">{{$dh->MaDH}}</a></td>
                    <td>{{$dh->EmailNguoiDat}}</td>
                    <td>{{$dh->TenNguoiNhan}}</td>
                    <td>{{$dh->DiaChiNguoiNhan}}</td>
                    <td>{{$dh->SDTNguoiNhan}}</td>
                    <td>{{$dh->NgayGiaoHang}}</td>
                    <td>{{$dh->NgayGioDatHang}}</td>
                    <td><?php echo number_format($dh->TongTien, 0) . " VNĐ"?></td>
                    <td>
                        <?php
                            if($dh->TrangThaiDH=="2")
                                echo "Đơn đã được giao";
                        ?>
                    </td>
                    </tr>
                @endif
            @endforeach
            
        </tbody>
        
    </table>
    <table class="table">
        <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> các đơn hàng đã hủy</div>
        <thead>
            <tr>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Email người đặt hàng</th>
            <th scope="col">Tên người nhận</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Ngày Giao Hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Trạng thái</th>
            <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            @foreach($donhang as $dh)
                @if($dh->TrangThaiDH=="-1")
                    <tr>
                        <td ><a href="/doanthunghiem/chitietdonhang/{{$dh->MaDH}}">{{$dh->MaDH}}</a></td>
                        <td>{{$dh->EmailNguoiDat}}</td>
                        <td>{{$dh->TenNguoiNhan}}</td>
                        <td>{{$dh->DiaChiNguoiNhan}}</td>
                        <td>{{$dh->SDTNguoiNhan}}</td>
                        <td>{{$dh->NgayGiaoHang}}</td>
                        <td>{{$dh->NgayGioDatHang}}</td>
                        <td><?php echo number_format($dh->TongTien, 0) . " VNĐ"?></td>
                        <td>
                            <?php
                                if($dh->TrangThaiDH=="-1")
                                    echo "Đơn đã hủy";
                            ?>
                        </td>
                   </tr>
                @endif
            @endforeach
            
        </tbody>
        
    </table>
@endsection
