@extends('login')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>Đăng Kí Tài Khoản</h2>
                
                
                <form action="{{URL::to('/postlogin_dangki')}}" method="post">

                     {{csrf_field()}}<!-- bảo mật form -->

                     @if(count($errors)>0)
                        <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}</br>
                        @endforeach
                        </div>
                    @endif
                    
                    @if(session('thongbaokhongthanhcong'))
                        <div class="alert alert-danger">
                            {{session('thongbaokhongthanhcong')}}
                        </div>
                    @endif
                    <input type="text" placeholder="Họ Và Tên" name="tenkh"/>
                    <input type="text" placeholder="Địa Chỉ" name="diachi"/>
                    <input type="email" placeholder="Email Address" name="email"/>
                    <input type="text" placeholder="Số Điện Thoại" name="sdt"/>
                    <input type="password" placeholder="Mật khẩu" name="matkhau"/>
                    <button type="submit" class="btn btn-default">Đăng Ký</button>
                </form>
            </div><!--/sign up form-->
        </div>
    </div>
@endsection