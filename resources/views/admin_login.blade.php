<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/admin_login/style.css')}}"/>
    <title>Trang quản lý admin</title>
</head>
<body>
    <div class="background-wrap">
    <div class="background"></div>
    </div>

    <form id="accesspanel" action="{{URL::to('/admin-dashboard')}}" method="post">
        {{csrf_field()}}
        <h1 id="litheader">Đăng Nhập</h1>
    
    <div class="inset">
        <p>
        <input type="text" name="tendangnhap" id="email" placeholder="Tên đăng nhập">
        </p>
        <p>
        <input type="password" name="matkhau" id="password" placeholder="Mật khẩu">
        </p>
        <div style="text-align: center; color:red;"> <!-- hiện thông báo đăngg nhập ko đúng -->
            <?php
                $mes_loi=Session::get('mes_loi');
                if($mes_loi){
                    echo $mes_loi;
                    Session::put('mes_loi',null);  
                }
            ?>
        </div>
        <div class="quenmk">
            <a href="#">Quên mật khẩu</a>
        </div>
        <input class="loginLoginValue" type="hidden" name="service" value="login" />
    </div>
    <p class="p-container">
        <input type="submit" name="Login" id="go" value="Đăng Nhập">
    </p>
    </form>

    <script type="text/javascript" src="{{asset('public/backend/js/admin_login/jquery-3.4.1.min.js')}}"></script>
</body>
</html>