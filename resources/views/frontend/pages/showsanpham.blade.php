@extends('welcome')
@section('content')
<div class="features_items">
    <h2 class="title text-center">Sản Phẩm</h2>
    @foreach($sanpham as $sp)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{!! asset('public/frontend/images/home/sanpham/'.$sp->HinhAnh) !!}" alt="" style="width: 250px; height: 192px;"/>
                            <h2><a href="/doanthunghiem/chitietsanpham/{{$sp->MaSP}}">{{$sp->TenSP}}</a></h2>
                            <p><?php echo number_format($sp->Gia, 0) . " VNĐ"?></p>
                            <a href="themvaogiohang/{{$sp->MaSP}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                </div>
            </div>
            
        </div>
    @endforeach
    <div class="col-sm-12" style="text-align: center;">
        <ul class="pagination modal-1" >
            {{$sanpham->links()}}
        </ul>
    </div>
    <!-- <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{asset('public/frontend/images/home/product2.jpg')}}" alt="" />
                    <h2>$56</h2>
                    <p>Easy Polo Black Edition</p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                </ul>
            </div>
        </div>
    </div> -->
    

</div>

@endsection