@extends('admin_layout')
@section('admin_data')
<form action="/doanthunghiem/suatintuc/{{$tintuc->MaTT}}" method="post">
        {{csrf_field()}}<!-- bảo mật form -->
    <div class="d-flex p-2" style="background-color:#333; color:#fff;">==> sửa sản phẩm</div></br>
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
    <div class="col">
        <div class="form-outline">
            <input type="text" id="matt" name="matt" class="form-control" value="{{$tintuc->MaTT}}" disabled/>
            <label class="form-label" for="form6Example1" >Mã Tin Tức</label>
        </div>
        </div>

        <div class="col">
        <div class="form-outline">
            <input type="text" id="tentintuc" name="tentt" class="form-control" value="{{$tintuc->TenTT}}"/>
            <label class="form-label" for="form6Example2" value="ádsad">Tên Tin Tức</label>
        </div>
        </div>

        
    </div>
            
    
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        
        <div class="col">
        <div class="form-outline">
            <input type="text" id="tieude" name="tieude" class="form-control" value="{{$tintuc->TieuDe}}"/>
            <label class="form-label" for="form6Example2">Tiêu Đề</label>
        </div>
        </div>
        <div class="form-file col">
            <input type="text" id="hinh" name="hinh" class="form-control" value="{{$tintuc->HinhAnh}}" readonly/>
            <input type="file" class="form-file-input" id="hinhanh" name="hinhanh" style="color:red;"/>
            <label class="form-file-label" for="customFile" >
            <span class="form-file-button">Hình Ảnh</span>
            </label>
        
        </div>
    </div>

    
    
    <!-- Message input -->
    <div class="form-outline mb-4">
        <textarea class="form-control" id="noidung" name="noidung" rows="4">{{$tintuc->NoiDung}}</textarea>
        <label class="form-label" for="form6Example7">Nội Dung</label>
    </div>
    
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Sửa</button>
</form>
@endsection