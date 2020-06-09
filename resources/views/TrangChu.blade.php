@extends('master')
@section('content')
<script>   
    //  $(document).ready(function addCart(id)
    //                             { 
                                    
                                   
                                
    //                                     //Lấy toàn bộ dữ liệu trong Form
    //                                     var Qlt  = $('#Qlt :selected').text();
    //                                     $.ajaxSetup({
    //                                         headers: {
    //                                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                                         }
    //                                     });
    //                                     //Sử dụng phương thức Ajax.
    //                                     $.ajax({
    //                                         type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
    //                                         url : 'Add', //gửi dữ liệu sang trang data.php
    //                                         data : {
    //                                            Qlt: Qlt
    //                                        }, //dữ liệu sẽ được gửi
    //                                         success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
    //                                                     { 
    //                                                     if(data == 'false') 
    //                                                     {
    //                                                         alert('Nhập sai thông tin');
    //                                                     }else{
    //                                                         alert(data);
    //                                                         // window.location.href = "https://www.google.com";
    //                                                     }
    //                                                     }
    //                                         });
    //                                         return false;
                                        
    //                                 });
        function addCart(id) {
                    $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                    url : 'AddCart', //gửi dữ liệu sang trang data.php
                    data : {
                        ID: id
                    }, //dữ liệu sẽ được gửi
                                            success : function(data){
                                                alert(data);
                                                location.reload();
                                            }  // Hàm thực thi khi nhận dữ liệu được từ server
                                                        
                                            });
                // $.ajax({
                //     type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                //     url : 'Test', //gửi dữ liệu sang trang data.php
                //     data : {
                //         ID: id
                //     }, //dữ liệu sẽ được gửi
                //     success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                //                 {
                //                     if (data ==='Đăng nhập để tiếp tục') {
                //                         alert(data);
                //                     }else{
                //                         alert('Thêm thành công');
                //                         location.reload();
                //                     $('#myModal3').modal('show');
                //                     }
                                    
                                
                                
                //                 }
                //     });
        

        };
//         function deleteCart(ID_SP,idkh) {
           
//            $.ajax({
//                type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
//                url : 'deleteCart.php', //gửi dữ liệu sang trang data.php
//                data : {
//                    ID_SP: ID_SP,
//                    ID_KH: idkh
//                }, //dữ liệu sẽ được gửi
//                success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
//                            {
                               
//                                    alert('Xóa thành công');
//                                    location.reload();
//                                $('#myModal3').modal('show');
                               
                               
                           
                           
//                            }
//                });
   

//    };
   function View(id) {
           
           $.ajax({
               type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
               url : 'View.php', //gửi dữ liệu sang trang data.php
               data : {
                   ID_SP: id
               }, //dữ liệu sẽ được gửi
               success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                           {
                            
                            window.location.href = "http://localhost/shop/web/single.php";
                               
                              
                               
                           
                           
                           }
               });
   

   };
  
</script>

<!-- banner -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
</ol>
<div class="carousel-inner" role="listbox">
    <div class="item active">
        <div class="container">
            <div class="carousel-caption">
                <h3><span>Khuyến mãi</span> đặc biệt</h3>
                <p>Áp dụng hôm nay</p>
                <a class="hvr-outline-out button2" href="mens.html">Xem thêm</a>
            </div>
        </div>
    </div>
    <div class="item item2">
        <div class="container">
            <div class="carousel-caption">
                <h3>BST Thu – Đông</h3>
                <p>Bứt phá mọi giới hạn sáng tạo</p>
                <a class="hvr-outline-out button2" href="mens.html">Xem thêm</a>
            </div>
        </div>
    </div>
    <div class="item item3">
        <div class="container">
            <div class="carousel-caption">
                <h3>Phụ kiện <span>Mới nhất</span></h3>
                <p>Cập nhật từ 28/10</p>
                <a class="hvr-outline-out button2" href="mens.html">Xem thêm</a>
            </div>
        </div>
    </div>

</div>
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
<!-- The Modal -->
</div>
<!-- //banner -->
<div class="banner_bottom_agile_info">
<div class="container">
    <div class="banner_bottom_agile_info_inner_w3ls">
        <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
            <figure class="effect-roxy">
                <img src="images/bottom1.jpg" alt=" " class="img-responsive" />
                <figcaption>
                    <h3><span>T</span>hời trang</h3>
                    <p>Mới nhất</p>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
            <figure class="effect-roxy">
                <img src="images/bottom2.jpg" alt=" " class="img-responsive" />
                <figcaption>
                    <h3><span>P</span>hụ kiện</h3>
                    <p>Mới nhất</p>
                </figcaption>
            </figure>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<!-- schedule-bottom -->
<div class="schedule-bottom">
<div class="col-md-6 agileinfo_schedule_bottom_left">
    <img src="images/mid.jpg" alt=" " class="img-responsive" />
</div>
<div class="col-md-6 agileits_schedule_bottom_right">
    <div class="w3ls_schedule_bottom_right_grid">
        <h3><span>7 tầng ưu đãi</span> đón gió mùa về</h3>
        <p>Chương trình áp dụng với tất cả các sản phẩm hiện có từ ngày 28/10 đến 8/11 với nhiều khuyến mãi cực sốc.
        </p>
        <div class="col-md-4 w3l_schedule_bottom_right_grid1">
            <i class="fa fa-gift" aria-hidden="true"></i>
            <h4>Trợ giá</h4>
            <h5 class="counter">777</h5>
        </div>
        <div class="col-md-4 w3l_schedule_bottom_right_grid1">
            <i class="fa fa-bolt" aria-hidden="true"></i>
            <h4>Xả hàng</h4>
            <h5 class="counter">777</h5>
        </div>
        <div class="col-md-4 w3l_schedule_bottom_right_grid1">
            <i class="fa fa-ticket" aria-hidden="true"></i>
            <h4>Voucher</h4>
            <h5 class="counter">777</h5>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="clearfix"> </div>
</div>
<!-- //schedule-bottom -->
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
<div class="container">
    <h3 class="wthree_text_info"> <span>Xu hướng</span> Mới</h3>

    <div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
        <a href="womens.html">
            <div class="bb-left-agileits-w3layouts-inner grid">
                <figure class="effect-roxy">
                    <img src="images/bb1.jpg" alt=" " class="img-responsive" />
                    <figcaption>
                        <h3><span>S</span>ale </h3>
                        <p>từ 55%</p>
                    </figcaption>
                </figure>
            </div>
        </a>
    </div>
    <div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
        <a href="mens.html">
            <div class="bb-middle-agileits-w3layouts grid">
                <figure class="effect-roxy">
                    <img src="images/bottom3.jpg" alt=" " class="img-responsive" />
                    <figcaption>
                        <h3><span>S</span>ale </h3>
                        <p>từ 55%</p>
                    </figcaption>
                </figure>
            </div>
        </a>
        <a href="mens.html">
            <div class="bb-middle-agileits-w3layouts forth grid">
                <figure class="effect-roxy">
                    <img src="images/bottom4.jpg" alt=" " class="img-responsive">
                    <figcaption>
                        <h3><span>S</span>ale </h3>
                        <p>từ 65%</p>
                    </figcaption>
                </figure>
            </div>
        </a>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<!--/grids-->
<div class="agile_last_double_sectionw3ls">
<div class="col-md-6 multi-gd-img multi-gd-text ">
    <a href="womens.html"><img src="images/bot_1.jpg" alt=" ">
        <h4>Ưu đãi <span>50%</span></h4>
    </a>

</div>
<div class="col-md-6 multi-gd-img multi-gd-text ">
    <a href="womens.html"><img src="images/bot_2.jpg" alt=" ">
        <h4>Ưu đãi<span>50%</span></h4>
    </a>
</div>
<div class="clearfix"></div>
</div>
<!--/grids-->
<!-- /new_arrivals -->
<div class="new_arrivals_agile_w3ls_info">
<div class="container">
    <h3 class="wthree_text_info"><span>Sản phẩm </span>Mới</h3>
    <div id="horizontalTab">
        <ul class="resp-tabs-list">
            <li> Nam</li>
            <li> Nữ</li>
            <li> Phụ kiện</li>
            <li> Giày- dép</li>
        </ul>
        <div class="resp-tabs-container">
            <!--/tab_one-->
            <div class="tab1">
                <!-- ----------- -->
            @foreach ($ProductMen as $item)
                
            
                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="images/{{ $item ->img }} " alt="" class="pro-image-front">
                            <img src="images/{{ $item ->img }} " alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="{{ route('home')}}/if/{{$item ->ID_SP}}" class="link-product-add-cart">Xem thêm</a>
                                    
                                </div>
                            </div>
                            <span class="product-new-top">Mới</span>

                        </div>
                        <div class="item-info-product ">
                            <h4><a href="single.html"> {{ $item ->TenSP }}  </a></h4>
                            <div class="info-product-price">
                                <span class="item_price">{{ $item ->Gia *70/100 }}đ</span>
                                <del>{{ $item ->Gia }}đ</del>
                            </div>
                            <div
                                class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                
                                    <form >
                                        @csrf
                                          
                                    <input type="button" value="Thêm vào giỏ hàng" class="button ADD" onclick="addCart({{ $item ->ID_SP }})" />
                                    </form>
                                    

                                
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                
                <!--  -->
                
                
                <!--  -->
            
                <!-- -------------------------- -->

                <div class="clearfix"></div>
            </div>
            <!--//tab_one-->
            <!--/tab_two-->
            <div class="tab2">
                <!-- ----------- -->
                @foreach ($ProductGirl as $item)
                
            
                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="images/{{ $item ->img }} " alt="" class="pro-image-front">
                            <img src="images/{{ $item ->img }} " alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                        <a href="{{ route('home')}}/if/{{$item ->ID_SP}}" class="link-product-add-cart">Xem thêm</a>
                                    
                                </div>
                            </div>
                            <span class="product-new-top">Mới</span>

                        </div>
                        <div class="item-info-product ">
                            <h4><a href="single.html"> {{ $item ->TenSP }}  </a></h4>
                            <div class="info-product-price">
                                <span class="item_price">{{ $item ->Gia *70/100 }}đ</span>
                                <del>{{ $item ->Gia }}đ</del>
                            </div>
                            <div
                                class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                

                                    <!-- <input type="hiden" name="ID" value="" /> -->
                                    <input type="button" value="Thêm vào giỏ hàng" class="button ADD" onclick="addCart({{ $item ->ID_SP }})" />

                                
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
            <!--//tab_two-->
            <div class="tab3">

                <!-- ----------- -->
                @foreach ($ProductPK as $item)
                
            
                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="images/{{ $item ->img }} " alt="" class="pro-image-front">
                            <img src="images/{{ $item ->img }} " alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                        <a href="{{ route('home')}}/if/{{$item ->ID_SP}}" class="link-product-add-cart">Xem thêm</a>
                                    
                                </div>
                            </div>
                            <span class="product-new-top">Mới</span>

                        </div>
                        <div class="item-info-product ">
                            <h4><a href="single.html"> {{ $item ->TenSP }}  </a></h4>
                            <div class="info-product-price">
                                <span class="item_price">{{ $item ->Gia *70/100 }}đ</span>
                                <del>{{ $item ->Gia }}đ</del>
                            </div>
                            <div
                                class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                

                                    <!-- <input type="hiden" name="ID" value="" /> -->
                                    <input type="button" value="Thêm vào giỏ hàng" class="button ADD" onclick="addCart({{ $item ->ID_SP }})" />

                                
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
            <div class="tab4">

                <!-- ----------- -->
                @foreach ($ProductGD as $item)
                
            
                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="images/{{ $item ->img }} " alt="" class="pro-image-front">
                            <img src="images/{{ $item ->img }} " alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                        <a href="{{ route('home')}}/if/{{$item ->ID_SP}}" class="link-product-add-cart">Xem thêm</a>
                                </div>
                            </div>
                            <span class="product-new-top">Mới</span>

                        </div>
                        <div class="item-info-product ">
                            <h4><a href="single.html"> {{ $item ->TenSP }}  </a></h4>
                            <div class="info-product-price">
                                <span class="item_price">{{ $item ->Gia *70/100 }}đ</span>
                                <del>{{ $item ->Gia }}đ</del>
                            </div>
                            <div
                                class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                

                                    <!-- <input type="hiden" name="ID" value="" /> -->
                                    <input type="button" value="Thêm vào giỏ hàng" class="button ADD" onclick="addCart({{ $item ->ID_SP }})" />

                                
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- //new_arrivals -->
<!-- /we-offer -->
<div class="sale-w3ls">
    <div class="container">
        <h6>Khuyến mãi ngắn hạn <span>40%</span></h6>

        <a class="hvr-outline-out button2" href="single.html">Xem thêm </a>
    </div>
</div>
<!-- //we-offer -->


<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content modal-info">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body modal-spa">
            <div class="login-grids">
                <div class="login">
                    <div class="login-bottom">
                        <h3>Sign up for free</h3>
                        <form>
                            <div class="sign-up">
                                <h4>Email :</h4>
                                <input type="text" value="Type here" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                            </div>
                            <div class="sign-up">
                                <h4>Password :</h4>
                                <input type="password" value="Password" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Password';}" required="">

                            </div>
                            <div class="sign-up">
                                <h4>Re-type Password :</h4>
                                <input type="password" value="Password" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Password';}" required="">

                            </div>
                            <div class="sign-up">
                                <input type="submit" value="REGISTER NOW">
                            </div>

                        </form>
                    </div>
                    <div class="login-right">
                        <h3>Sign in with your account</h3>
                        <form>
                            <div class="sign-in">
                                <h4>Email :</h4>
                                <input type="text" value="Type here" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Type here';}" required="">
                            </div>
                            <div class="sign-in">
                                <h4>Password :</h4>
                                <input type="password" value="Password" onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="single-bottom">
                                <input type="checkbox" id="brand" value="">
                                <label for="brand"><span></span>Remember Me.</label>
                            </div>
                            <div class="sign-in">
                                <input type="submit" value="SIGNIN">
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy
                        Policy</a></p>
            </div>
        </div>
    </div>
</div>
</div>
<!-- //login -->
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;">
</span></a>




<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<script src="js/modernizr.custom.js"></script>
<!-- Custom-JavaScript-File-Links -->
<!-- cart-js -->
<!-- <script src="js/minicart.min.js"></script>
<script>

paypal.minicart.render({
    action: '#'
});

if (~window.location.search.indexOf('reset=true')) {
    paypal.minicart.reset();
}
</script> -->

<!-- //cart-js -->
<!-- script for responsive tabs -->
<script>
$(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true,   // 100% fit in a container
        closed: 'accordion', // Start closed if in accordion view
        activate: function (event) { // Callback function if tab is switched
            var $tab = $(this);
            var $info = $('#tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });
    $('#verticalTab').easyResponsiveTabs({
        type: 'vertical',
        width: 'auto',
        fit: true
    });
});
</script>

<!-- //cart-js --> 
<!-- script for responsive tabs -->						
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!-- //script for responsive tabs -->		
<!-- stats -->
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.countup.js"></script>
<script>
$('.counter').countUp();
</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$(".scroll").click(function(event){		
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
});
});
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
$(document).ready(function() {
    /*
        var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear' 
        };
    */
                        
    $().UItoTop({ easingType: 'easeOutQuart' });
                        
    });
</script>
<!-- //here ends scrolling icon -->


<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap.js"></script>

@endsection
