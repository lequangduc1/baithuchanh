@extends('admin_layout')
@section('admin_data')
<form class="row g-3" action="{{URL::to('/postdoimatkhau_admin')}}"  method="post">
    {{csrf_field()}}<!-- bảo mật form -->
    <div class="col-md-12">
        <div class="col-md-4">
            @if(session('thongbaokhongthanhcong'))
                <div class="alert alert-danger">
                    {{session('thongbaokhongthanhcong')}}
                </div>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="form-outline">
                <input type="password" class="form-control" name="matkhaucu" placeholder="Mật khẩu cũ" />
            </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:20px">
        <div class="col-md-4">
            <div class="form-outline">
                <input type="password" class="form-control" name="matkhaumoi" placeholder="Mật khẩu mới" />
            </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:20px">
        <div class="col-md-4">
            <div class="form-outline">
                <input type="password" class="form-control" name="matkhaumoi2" placeholder="Nhập Lại mật khẩu mới" />
            </div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top:20px">
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Đổi mật khẩu</button>
        </div>
    </div>
</form>
@endsection