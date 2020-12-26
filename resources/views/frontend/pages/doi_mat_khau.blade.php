@extends('login')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>Đổi mật khẩu</h2>
                
                
                <form action="{{URL::to('/postdoimatkhau')}}" method="post">

                     {{csrf_field()}}<!-- bảo mật form -->
                   
                    @if(session('thongbaokhongthanhcong'))
                        <div class="alert alert-danger">
                            {{session('thongbaokhongthanhcong')}}
                        </div>
                    @endif
                    <input type="password" placeholder="Mật khẩu cũ" name="matkhaucu"/>
                    <input type="password" placeholder="Mật khẩu mới" name="matkhaumoi"/>
                    <input type="password" placeholder="Nhập lại mật khẩu mới" name="matkhaumoi2"/>
                    <button type="submit" class="btn btn-default">Thay đổi mật khẩu</button>
                </form>
            </div><!--/sign up form-->
        </div>
    </div>
@endsection