@extends('admin_layout')
@section('admin_data')
<form action="{{URL::to('/save-data-sanpham')}}" method="post">
        {{csrf_field()}}<!-- bảo mật form -->
  <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> Thêm sản phẩm</div></br>
    @if(count($errors)>0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $err)
              {{$err}}</br>
            @endforeach
          </div>
    @endif

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
  <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
          <input type="text" id="tensanpham" name="tensanpham" class="form-control" />
          <label class="form-label" for="form6Example2">Tên Sản Phẩm</label>
        </div>
      </div>

      <div class="col">
        <div class="form-outline">
          <input type="text" id="gia" name="gia" class="form-control" />
          <label class="form-label" for="form6Example1">Giá sản phẩm</label>
        </div>
      </div>
    </div>
        
  
   <!-- 2 column grid layout with text inputs for the first and last names -->
   <div class="row mb-4">
    
    <div class="col">
      <div class="form-outline">
        <input type="text" id="soluong" name="soluong" class="form-control" />
        <label class="form-label" for="form6Example2">Số Lượng</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline ">
      <select class="select" data-placeholder="Example placeholder" name="hangxe">
        @foreach($hangxe as $hx)
        <option>{{$hx->HangXe}}</option>
        @endforeach
      </select>
      </div>
    </div>
  </div>

  
<!-- hinhanh -->
  <div class="form-file">
  <input type="file" class="form-file-input" id="hinhanh" name="hinhanh" style="color:red;" />
  <label class="form-file-label" for="customFile" >
  <span class="form-file-button">Hình Ảnh</span>
  </label>
  
</div>
</br>
   <!-- Message input -->
   <div class="form-outline mb-4">
    <textarea class="form-control" id="mota" name="mota" rows="4"></textarea>
    <label class="form-label" for="form6Example7">Mô tả sản phẩm</label>
  </div>
 
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Thêm</button>
</form>




<!-- list  -------------------------------------------------------->

<table class="table">
  <div class="d-flex p-2" style="background-color:#333; color:#fff;">
    <form class="row g-3" action="{{URL::to('/timkiemsp_admin')}}"  method="get">
      <div class="col-md-12" >
        <div class="col-md-4" style="float:left;">
          <p>==> Tất cả sản phẩm</p>
        </div>
        <div class="col-md-4" style="float:left;">
          <div class="form-outline">
            <input type="text" class="form-control" id="validationDefault01" placeholder="Tìm Kiếm" name="timkiem" />
          </div>
        </div>
        <div class="col-md-4" style="float:left;">
          <button class="btn btn-primary" type="submit" style="height:38px; width:40px; margin:0;"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </form>
  </div>

  <thead>
    <tr>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Giá sản phẩm</th>
      <th scope="col">Số lượng</th>
      <th scope="col">HÌnh ảnh</th>
      <th scope="col">Hãng xe</th>
      <th scope="col">Mô tả</th>
      <th scope="col">#</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>
    @foreach($sanpham as $sp)
    <tr>
      <td>{{$sp->MaSP}}</td>
      <td>{{$sp->TenSP}}</td>
      <td><?php echo number_format($sp->Gia, 0) . " VNĐ"?></td>
      <td>{{$sp->SoLuong}}</td>
      <td>{{$sp->HinhAnh}}</td>
      <td>{{$sp->HangXe}}</td>
      <td>{{$sp->NoiDungMoTa}}</td>
      <td>
          <a href="sua/{{$sp->MaSP}}" ><i class="fa fa-play-circle"></i></a>

            

            <a href="xoasanpham/{{$sp->MaSP}}" ><i class="fa fa fa-trash"></i></a>

              
            
          

    </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection