@extends('admin_layout')
@section('admin_data')
<form action="{{URL::to('/dangkinhanvien')}}" method="post">
        {{csrf_field()}}<!-- bảo mật form -->
<div class="d-flex p-2" style="background-color:#333; color:#fff;">==> Thêm sản phẩm</div></br>
    <!-- Xuất thông báo -->
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
    <!-- Xuất thông báo -->
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-12">
    <div class="col-4">
      <div class="form-outline">
        <input type="text" id="tennhanvien" name="tennhanvien" class="form-control" />
        <label class="form-label" for="form6Example2">Tên Nhân Viên</label>
      </div>
    </div>
  </div>

  <div class="row mb-12">
    <div class="col-4">
      <div class="form-outline">
        <input type="text" id="sdt" name="sdt" class="form-control" />
        <label class="form-label" for="form6Example2">Số Điện Thoại</label>
      </div>
    </div>
  </div>
        
  <div class="row mb-12">
    <div class="col-4">
      <div class="form-outline">
        <input type="text" id="diachi" name="diachi" class="form-control" />
        <label class="form-label" for="form6Example2">Địa Chỉ</label>
      </div>
    </div>
  </div>
  <div class="row mb-12">
    <div class="col-4">
      <div class="form-outline">
        <input type="Email" id="email" name="email" class="form-control" />
        <label class="form-label" for="form6Example2">Email</label>
      </div>
    </div>
  </div>
  <div class="row mb-12">
    <div class="col-4">
      <div class="form-outline">
        <input type="text" id="tendangnhap" name="tendangnhap" class="form-control" />
        <label class="form-label" for="form6Example2">Tên Đăng Nhập</label>
      </div>
    </div>
  </div>
  <div class="row mb-12">
    <div class="col-4">
      <div class="form-outline">
        <input type="password" id="matkhau" name="matkhau" class="form-control" />
        <label class="form-label" for="form6Example2">Mật Khẩu</label>
      </div>
    </div>
  </div>
  <div class="row mb-12">
    <div class="col-4">
      <div class="form-outline ">
        <select class="select" data-placeholder="Example placeholder" name="bophan">
            @foreach($bophan as $bp)
            <option>{{$bp->TenBP}}</option>
            @endforeach
        </select>
        <label class="form-label" for="form6Example2">Bộ Phận</label>
      </div>
    </div>
  </div>
 
  <!-- Submit button -->
  <div class="row mb-12" style="margin-top:20px">
    <div class="col-2">
      <button type="submit" class="btn btn-primary btn-block mb-4">Thêm Nhân Viên</button>
    </div>
  </div>
</form>




<!-- list  -------------------------------------------------------->


@endsection