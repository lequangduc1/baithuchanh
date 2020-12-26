@extends('admin_layout')
@section('admin_data')
    <table class="table">
        <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> Chi tiết đơn hàng có mã</div>
        <thead>
            <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số lượng mua</th>
                <th scope="col">Hãng xe</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chitietdonhang as $ctdh)
                @foreach($sanpham as $sp)
                    @if($sp->MaSP == $ctdh->MaSP)
                        <tr>
                            <td>{{$ctdh->MaDH}}</td>
                            <td>{{$sp->MaSP}}</td>
                            <td>{{$sp->TenSP}}</td>
                            <td><?php echo number_format($sp->Gia, 0) . " VNĐ"?></td>
                            <td>{{$ctdh->SoLuongMua}}</td>
                            <td>{{$sp->HangXe}}</td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            
        </tbody>
        
    </table>
    
@endsection
