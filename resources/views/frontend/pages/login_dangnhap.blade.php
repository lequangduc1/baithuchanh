@extends('login')
@section('content')
    <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
            <div class="login-form"><!--login form-->
                <h2>Login to your account</h2>
                <form action="{{URL::to('/getlogin_dangnhap')}}" method="get">
                    {{csrf_field()}}<!-- bảo mật form -->

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
                    <input type="text" placeholder="email" name="email"/>
                    <input type="password" placeholder="Mật khẩu" name="matkhau"/>
                    
                    <span>
                        <a href="login_dangki">đăng ký</a>
                        
                    </span>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div><!--/login form-->
        </div>
    </div>
@endsection