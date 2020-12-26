@extends('admin_layout')
@section('admin_data')
<form action="{{URL::to('/them_tinntuc')}}" method="post">
{{csrf_field()}}<!-- bảo mật form -->
<div class="d-flex p-2" style="background-color:#333; color:#fff;">==> Thêm Tin tức</div></br>
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
    <!-- <div class="col">
      <div class="form-outline">
        <input type="text" id="matinntuc" name="matinntuc" class="form-control" />
        <label class="form-label" for="form6Example1">Mã tin tức</label>
      </div>
    </div> -->
    <div class="col">
      <div class="form-outline">
        <input type="text" id="tentintuc" name="tentintuc" class="form-control" />
        <label class="form-label" for="form6Example2">Tên tin tức</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="tieude" name="tieude" class="form-control" />
        <label class="form-label" for="form6Example1">Tiêu đề</label>
      </div>
    </div>
  </div>

  
   <!-- 2 column grid layout with text inputs for the first and last names -->
   <div class="row mb-4">
    <div class="col">
        <div class="form-outline">
            <div class="form-file">
                <input type="file" class="form-file-input" id="hinhanh" name="hinhanh" style="color:red;" />
                <label class="form-file-label" for="customFile" >
                <span class="form-file-button">Hình Ảnh</span>
                </label>
                
            </div>
        </div>
    </div>
    <div class="col">
      <div class="form-outline mb-4">
        <textarea class="form-control" id="noidung" name="noidung" rows="4"></textarea>
        <label class="form-label" for="form6Example7">Nội dung</label>
      </div>
    </div>
  </div>
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Thêm</button>
</form>

<!-- list  -->

<table class="table">
<div class="d-flex p-2" style="background-color:#333; color:#fff;">==> Tất cả tin tức</div>
  <thead>
    <tr>
      <th scope="col">Mã Tin Tức</th>
      <th scope="col">Tên Tin Tức</th>
      <th scope="col">Tiêu Đề</th>
      <th scope="col">Hình Ảnh</th>
      <th scope="col">Nội Dung</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tintuc as $tt)
      <tr>
        <td>{{$tt->MaTT}}</td>
        <td>{{$tt->TenTT}}</td>
        <td>{{$tt->TieuDe}}</td>
        <td>{{$tt->HinhAnh}}
        <!-- <img src="{!! asset('public/frontend/images/TinTuc/'.$tt->HinhAnh) !!}" alt="" style="width: 250px; height: 192px;"/> -->
        </td>
        <td>{{$tt->NoiDung}}</td>
        <td>
            <a href="viewsua/{{$tt->MaTT}}" ><i class="fa fa-play-circle"></i></a>
            <a href="xoatintuc/{{$tt->MaTT}}" ><i class="fa fa fa-trash"></i></a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection