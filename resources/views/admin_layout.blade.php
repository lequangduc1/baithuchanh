<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Admin Web Xe Máy</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('public/backend/css/admin_layout/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{asset('public/backend/css/admin_layout/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{asset('public/backend/css/admin_layout/style.min.css')}}" rel="stylesheet">
  <!-- <link href="{{asset('public/backend/css/admin_layout/style.css')}}" rel="stylesheet"> -->
  <link href="{{asset('public/backend/css/admin_layout/mycss.css')}}" rel="stylesheet">
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        
        <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" >
          <strong class="blue-text">MDB</strong>
        </a>

        <!-- Collapse -->

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->

          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a class="nav-link waves-effect" href="#">Trang ADMIN website bán xe máy<span class="sr-only">(current)</span></a></li>
            <!-- <li class="nav-item"><a class="nav-link waves-effect" href="#">About MDB</a></li>
            <li class="nav-item"><a class="nav-link waves-effect" href="#" >Free download</a></li>
            <li class="nav-item"><a class="nav-link waves-effect" href="#">Free tutorials</a></li> -->
          </ul>

          <!-- Right -->

            <ul class="navbar-nav nav-flex-icons">
                
                <li class="nav-item">
                <a href="#" class="nav-link waves-effect"style="border:1px solid #000" >
                    <i class="fa fa-users" aria-hidden="true" > <!-- Đổ tên đăng nhập vào icon user -->
                        <?php
                            $name=Session::get('tendangnhap');
                            if($name){
                                echo $name; 
                            }
                        ?>
                    </i>
                </a>
                </li>
                <li class="nav-item"><a href="{{URL::to('/logout')}}" class="nav-link waves-effect" >Đăng Xuất</a></li>
                <li class="nav-item"><a href="#" class="nav-link waves-effect" >|</a></li>
                <li class="nav-item"><a href="/doanthunghiem/doimatkhau_admin" class="nav-link waves-effect" >Đổi Mật Khẩu</a></li>
            </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->

    <!-- menu  left admin -->
      <div class="sidebar-fixed position-fixed">

        <a class="logo-wrapper waves-effect">
          <img src="#" class="img-fluid" alt="">
        </a>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item active waves-effect"><i class="fas fa-chart-pie mr-3"></i>Danh mục quản lý  </a>
          <a href="{{URL::to('viewkhachhang')}}" class="list-group-item list-group-item-action waves-effect"><i class="fas fa-user mr-3"></i>Quản Lý Khách Hàng</a>
          <a href="{{URL::to('addsanpham')}}" class="list-group-item list-group-item-action waves-effect"><i class="fas fa-table mr-3"></i>Quản Lý Sản Phẩm</a>
          <a href="{{URL::to('addtintuc')}}" class="list-group-item list-group-item-action waves-effect"><i class="fas fa-map mr-3"></i>Quản Lý Tin Tức</a>
          <a href="{{URL::to('viewnhanvien')}}" class="list-group-item list-group-item-action waves-effect"><i class="fas fa-money-bill-alt mr-3"></i>Quản Lý Nhân Viên</a>
          <a href="{{URL::to('quanlydonhang')}}" class="list-group-item list-group-item-action waves-effect"><i class="fas fa-file mr-3"></i>Quản Lý Đơn Hàng</a>
        </div>

      </div>
    <!-- menu  left admin -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->

  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5" style="min-height: 300px;">
        @yield('admin_data')
    </div>
  </main>

  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="#" ><i class="fab fa-facebook-f mr-3"></i></a>

      <a href="#" ><i class="fab fa-twitter mr-3"></i></a>

      <a href="#" ><i class="fab fa-youtube mr-3"></i></a>

      <a href="#" ><i class="fab fa-google-plus mr-3"></i></a>

      <a href="#" ><i class="fab fa-dribbble mr-3"></i></a>

      <a href="#" ><i class="fab fa-pinterest mr-3"></i></a>

      <a href="#" ><i class="fab fa-github mr-3"></i></a>

      <a href="#" ><i class="fab fa-codepen mr-3"></i></a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2020 Copyright:
      <a href="#" > Duc-Minh </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="{{asset('public/backend/js/admin_layout/jquery-3.4.1.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('public/backend/js/admin_layout/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('public/backend/js/admin_layout/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
  <!-- Initializations -->
 

  <!-- Charts -->
  <!-- <script type="text/javascript" src="js/charts.js"></script> -->
    

</body>

</html>
