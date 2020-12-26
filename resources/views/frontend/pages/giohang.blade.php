@extends('login')
@section('content')
    <!-- cart items -->
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Giỏ hàng</li>
				  <li style="float:right;"><a href="/doanthunghiem/viewdonhang">Đặt Hàng</a></li>
				  <li style="float:right;">Tổng Tiền: 
				  <?php $tong =0; ?>
				  		@foreach($sanpham as $sp)
							@foreach($chitietgiohang as $ctgh)
								@if($sp->MaSP == $ctgh->MaSP)
									<?php
										$tong = $tong + $ctgh->SoLuongMua*$sp->Gia;
									?>
								@endif
							@endforeach
						@endforeach
						<?php echo number_format($tong, 0) . " VNĐ"?> VNĐ
				  </li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Ảnh sản phẩm</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá sản phẩm</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($sanpham as $sp)
							@foreach($chitietgiohang as $ctgh)
								@if($sp->MaSP == $ctgh->MaSP)
									<tr>
										<td class="cart_product">
											<a href=""><img src="{!! asset('public/frontend/images/home/sanpham/'.$sp->HinhAnh) !!}" alt="" style="width:80px; height:80px;"></a>
										</td>
										<td class="cart_description">
											<h4><a href="">{{$sp->TenSP}}</a></h4>
											<p>Mã Sản Phẩm: {{$sp->MaSP}}</p>
										</td>
										<td class="cart_price">
											<p><?php echo number_format($sp->Gia, 0) . " VNĐ"?></p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<a class="cart_quantity_up" href="/doanthunghiem/tangsoluong/{{$ctgh->MaCTGH}}"> + </a>
												<input class="cart_quantity_input" type="text" name="quantity" value="{{$ctgh->SoLuongMua}}" autocomplete="off" size="2" disabled>
												<a class="cart_quantity_down" href="/doanthunghiem/giamsoluong/{{$ctgh->MaCTGH}}"> - </a>
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">
												<?php
													echo number_format($ctgh->SoLuongMua*$sp->Gia, 0) . " VNĐ";
												?> VNĐ
											</p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="/doanthunghiem/xoa_sp_gh/{{$ctgh->MaCTGH}}"><i class="fa fa-times"></i></a>
										</td>
									</tr>
								@endif
							@endforeach
						@endforeach
					</tbody>
				</table>
			</div>

		</div>
	</section> 
    <!--cart_items-->
@endsection