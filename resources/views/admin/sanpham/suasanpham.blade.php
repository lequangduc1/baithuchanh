@extends('admin_layout')
@section('admin_data')
<form action="/doanthunghiem/suasanpham/{{$sanpham->MaSP}}" method="post">
        {{csrf_field()}}<!-- bảo mật form -->
<div class="d-flex p-2" style="background-color:#333; color:#fff;">==> sửa sản phẩm</div></br>
<a href="showsanpham">click để sữa sản phẩm</a></br>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
  <div class="col">
      <div class="form-outline">
        <input type="text" id="masp" name="masp" class="form-control" value="{{$sanpham->MaSP}}" disabled/>
        <label class="form-label" for="form6Example1" >Mã Sản Phẩm</label>
      </div>
    </div>

    <div class="col">
      <div class="form-outline">
        <input type="text" id="tensanpham" name="tensanpham" class="form-control" value="{{$sanpham->TenSP}}"/>
        <label class="form-label" for="form6Example2" value="ádsad">Tên Sản Phẩm</label>
      </div>
    </div>

    
  </div>
        
  
   <!-- 2 column grid layout with text inputs for the first and last names -->
   <div class="row mb-4">
    
    <div class="col">
      <div class="form-outline">
        <input type="text" id="soluong" name="soluong" class="form-control" value="{{$sanpham->SoLuong}}"/>
        <label class="form-label" for="form6Example2">Số Lượng</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="gia" name="gia" class="form-control" value="{{$sanpham->Gia}}"/>
        <label class="form-label" for="form6Example1">Giá sản phẩm</label>
      </div>
    </div>
  </div>

  
<!-- hinhanh -->
<div class="row mb-4">
  <div class="form-file col">
    <input type="text" id="hinh" name="hinh" class="form-control" value="{{$sanpham->HinhAnh}}" readonly/>
    <input type="file" class="form-file-input" id="hinhanh" name="hinhanh" style="color:red;" file="{{$sanpham->HinhAnh}}"/>
    <label class="form-file-label" for="customFile" >
    <span class="form-file-button">Hình Ảnh</span>
    </label>
  
  </div>
<div class="col">
      <div class="form-outline ">
      <select class="select" data-placeholder="Example placeholder" name="hangxe" value="{{$sanpham->HangXe}}">
        <option >{{$sanpham->HangXe}}</option>
        @foreach($hangxe as $hx)
        <option>{{$hx->HangXe}}</option>
        @endforeach
      </select>
      </div>
    </div>

</div>
</br>
   <!-- Message input -->
   <div class="form-outline mb-4">
    <textarea class="form-control" id="mota" name="mota" rows="4">{{$sanpham->NoiDungMoTa}}</textarea>
    <label class="form-label" for="form6Example7">Mô tả sản phẩm</label>
  </div>
 
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sửa</button>
</form>
@endsection