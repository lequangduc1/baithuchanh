<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
								<i class="fa fa-user"></i>
									<?php
										$name=Session::get('Email');
										if($name){
											echo $name; 
										}
										else echo "Account";
									?>
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="/doanthunghiem/getlogin_dangxuat">Đăng Xuất</a></li>
									<li><a href="/doanthunghiem/doimatkhau">Thay Đổi Mật Khẩu</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								<li><a href="/doanthunghiem/admin"><i class="fa fa-crosshairs"></i> Admin</a></li>
								<li><a href="/doanthunghiem/giohang"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
								<?php
										$name=Session::get('Email');
										if($name==""){?>
											<li><a href="/doanthunghiem/login"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
											<?php		}
									?>
								<!-- <li><a href="/doanthunghiem/login"><i class="fa fa-lock"></i> Đăng Nhập</a></li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/doanthunghiem/trang_chu" class="active">Trang Chủ</a></li>
								<!-- <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login">Login</a></li> 
                                    </ul>
                                </li>  -->
								<!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>  -->
								<li><a href="/doanthunghiem/trang_tintuc">Tin Tức</a></li>
								<!-- <li><a href="contact-us.html">Contact</a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="{{URL::to('/timkiemsp')}}"  method="get" >
							<div class="search_box pull-right">
								<input type="text" placeholder="Search" name="timkiem" />
								<button class="fa fa-search" type="submit" id="timkiemsubmit" style="width:60px;height:35px;background-color:#F0F0E9;text-align: center;line-height: 35px;margin-top: -10px; border:none"></button>
								<!-- <a href="/doanthunghiem/timkiemsp"><i class="fa fa-search" style="width:30px;height:35px;background-color:#F0F0E9;text-align: center;line-height: 35px"></i></a> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->