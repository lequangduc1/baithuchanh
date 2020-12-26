<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{asset('public/frontend/images/home/slider/slider1.jpg')}}" class="girl img-responsive" alt=""style="width: 1140px; height: 600px;"/>
                        </div>
                        <div class="item">
                            <img src="{{asset('public/frontend/images/home/slider/slider2.jpg')}}" style="width: 1140px; height: 600px;" />
                        </div>
                        <div class="item">
                            <img src="{{asset('public/frontend/images/home/slider/slider3.jpg')}}" style="width: 1140px; height: 600px;" />
                        </div>                           							
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->