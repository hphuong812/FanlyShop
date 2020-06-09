@extends('master')
@section('content')
    <!-- header -->
       <!-- /banner_bottom_agile_info -->
	   <div class="page-head_agile_info_w3l">
            <div class="container">
                <h3><span>Trang</span> chi tiết</h3>
                <!--/w3_short-->
                     <div class="services-breadcrumb">
                            <div class="agile_inner_breadcrumb">
    
                               <ul class="w3_short">
                                    <li><a href="index.html">Trang chủ</a><i>|</i></li>
                                    <li>Trang chi tiết</li>
                                </ul>
                             </div>
                    </div>
           <!--//w3_short-->
        </div>
    </div>
    
      <!-- banner-bootom-w3-agileits -->
    <div class="banner-bootom-w3-agileits">
        <div class="container">
             <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        
                        <ul class="slides">
                                @foreach ($ProductIF as $item)
                            <li data-thumb="images/{{ $item ->img }}">
                                <div class="thumb-image"> <img src="images/{{ $item ->img }}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                            <li data-thumb="images/{{ $item ->img }}">
                                <div class="thumb-image"> <img src="images/{{ $item ->img }}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>	
                            <li data-thumb="images/{{ $item ->img }}">
                                <div class="thumb-image"> <img src="images/{{ $item ->img }}" data-imagezoom="true" class="img-responsive"> </div>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>	
                </div>
            </div>
            <div class="col-md-8 single-right-left simpleCart_shelfItem" style="margin-top:3%;">
                        <h3>{{ $item ->TenSP }}</h3>
                        <p><span class="item_price"></span>{{ $item ->Gia *70/100 }} đ<del>{{ $item ->Gia}} đ</del></p>
                        <div class="rating1">
                            <span class="starRating">
                                <input id="rating5" type="radio" name="rating" value="5">
                                <label for="rating5">5</label>
                                <input id="rating4" type="radio" name="rating" value="4">
                                <label for="rating4">4</label>
                                <input id="rating3" type="radio" name="rating" value="3" checked="">
                                <label for="rating3">3</label>
                                <input id="rating2" type="radio" name="rating" value="2">
                                <label for="rating2">2</label>
                                <input id="rating1" type="radio" name="rating" value="1">
                                <label for="rating1">1</label>
                            </span>
                        </div>
                        <form >
                            @csrf
                            <div class="color-quality" style="margin-top:5%;">
                                <div class="color-quality-right">
                                    <h5>Số lượng :</h5>
                                    <select id="Qlt" class="frm-field required sect">
                                        <option >1</option>
                                        <option >2</option> 
                                        <option >3</option>					
                                        <option >4</option>								
                                    </select>
                                </div>
                            </div>
                            
                            <div class="occasion-cart" style="margin-top:5%;">
                                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                <input type="button" id="addC" value="Thêm vào giỏ hàng" class="button ADD"  />
                                </div>
                                                                                    
                            </div>
                        </form>
                        
                        <script>
                            $(document).ready(function()
                                { 
                                    
                                    var submit = $("#addC");
                                    submit.click(function()
                                    {
                                
                                        //Lấy toàn bộ dữ liệu trong Form
                                        var Qlt  = $('#Qlt :selected').text();
                                        $.ajaxSetup({
                                            headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            }
                                        });
                                        //Sử dụng phương thức Ajax.
                                        $.ajax({
                                            type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                                            url : 'Add', //gửi dữ liệu sang trang data.php
                                            data : {
                                               Qlt: Qlt
                                           }, //dữ liệu sẽ được gửi
                                            success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                                                        { 
                                                       
                                                            alert(data);
                                                            location.reload();
                                                            // window.location.href = "https://www.google.com";
                                                        
                                                        }
                                            });
                                            return false;
                                        });
                                    });
                            // $(document).on('click', '#add', function () {
                            //     //Lấy toàn bộ dữ liệu trong Form
                            //     var Qlt  = $('#Qlt :selected').text();
                            //     // var data = document.getElementById("ID").value;
                            //     //Sử dụng phương thức Ajax.
                            //     $.ajax({
                            //                type : 'POST', //Sử dụng kiểu gửi dữ liệu POST
                            //                url : 'Add', //gửi dữ liệu sang trang data.php
                            //                data : {
                            //                    Qlt: Qlt
                            //                }, //dữ liệu sẽ được gửi
                            //                success : function(data)  // Hàm thực thi khi nhận dữ liệu được từ server
                            //                            {
                                                        
                            //                             if (data ==='Đăng nhập để tiếp tục') {
                            //                                 alert(data);
                            //                             }else{
                            //                                 alert(data);
                            //                                 location.reload();
                                                        
                            //                             }
                                                                
                                                    
                            //                            }
                            //                });
                            //     return false;
                            // });
                        </script>
                            
                        @endforeach
                        <ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
                                                               <li class="share">Chia sẻ : </li>
                                                                <li><a href="#" class="facebook">
                                                                      <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                                                                      <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
                                                                <li><a href="#" class="twitter"> 
                                                                      <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                                                                      <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
                                                                <li><a href="#" class="instagram">
                                                                      <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
                                                                      <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
                                                                <li><a href="#" class="pinterest">
                                                                      <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
                                                                      <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
                                                            </ul>
                        
                  </div>
                     <div class="clearfix"> </div>
                    <!-- /new_arrivals --> 
        <div class="responsive_tabs_agileits"> 
                    <div id="horizontalTab">
                            <ul class="resp-tabs-list">
                                <li>Mô tả</li>
                                <li>Đánh giá</li>
                                <li>Thông tin</li>
                            </ul>
                        <div class="resp-tabs-container">
                        <!--/tab_one-->
                           <div class="tab1">
    
                                <div class="single_page_agile_its_w3ls">
                                        @foreach ($ProductIF as $item)
                                  <h6>{{ $item ->TenSP }}</h6>
                
                                      
                                  @endforeach
                                   <p>Với thiết kế này, chiếc sơ mi hàng hiệu mang lại sự mềm mại, tinh khôi và duyên dáng cho những quý ông nam tính. Bên cạnh đó, với thiết kế mới lạ vạt chéo tạo cổ hình chữ V sâu tạo thêm nét riêng cho người mặc.</p>
                                </div>
                            </div>
                            <!--//tab_one-->
                            <div class="tab2">
                                
                                <div class="single_page_agile_its_w3ls">
                                    <div class="bootstrap-tab-text-grids">
                                        <div class="bootstrap-tab-text-grid">
                                            <div class="bootstrap-tab-text-grid-left">
                                                <img src="images/t1.jpg" alt=" " class="img-responsive">
                                            </div>
                                            <div class="bootstrap-tab-text-grid-right">
                                                <ul>
                                                    <li><a href="#">Admin</a></li>
                                                    <li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Trở về</a></li>
                                                </ul>
                                                <p>H&M là thương hiệu thời trang đình đám của Mỹ. Những thiết kế của nó luôn thu hút hàng triệu tín đồ thời trang trên thế giới. Thiết kế thông thường của hãng thời trang này rất đơn giản và nhẹ nhàng nhưng luôn toát lên được cá tính của bạn. Với sắc trắng, áo sơ mi nữ hàng hiệu của thương hiệu H&M sẽ giúp cho các nàng thoả sức kết hợp với đủ mọi phong cách khi diện qua các loại trang phục và phụ kiện khác nhau.</p>
                                            </div>
                                            <div class="clearfix"> </div>
                                         </div>
                                         <div class="add-review">
                                            <h4>Thêm đánh giá</h4>
                                            <form action="#" method="post">
                                                    <input type="text" name="Name" required="Name">
                                                    <input type="email" name="Email" required="Email"> 
                                                    <textarea name="Message" required=""></textarea>
                                                <input type="submit" value="GỬI">
                                            </form>
                                        </div>
                                     </div>
                                     
                                 </div>
                             </div>
                               <div class="tab3">
    
                                <div class="single_page_agile_its_w3ls">
                                  <h6>H&M</h6>
                                   <p>H&M là thương hiệu thời trang đình đám của Mỹ. Những thiết kế của nó luôn thu hút hàng triệu tín đồ thời trang trên thế giới. Thiết kế thông thường của hãng thời trang này rất đơn giản và nhẹ nhàng nhưng luôn toát lên được cá tính của bạn. Với sắc trắng, áo sơ mi nữ hàng hiệu của thương hiệu H&M sẽ giúp cho các nàng thoả sức kết hợp với đủ mọi phong cách khi diện qua các loại trang phục và phụ kiện khác nhau.</p>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>
        <!-- //new_arrivals --> 
              <!--/slider_owl-->
        
                <div class="w3_agile_latest_arrivals">
                
                              <div class="clearfix"> </div>
                        <!--//slider_owl-->
                     </div>
                </div>
     </div>
    <!--//single_page-->
    
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <!-- //js -->
    <script src="js/modernizr.custom.js"></script>
        <!-- Custom-JavaScript-File-Links --> 
        <!-- cart-js -->
        <script src="js/minicart.min.js"></script>
    <script>
        // Mini Cart
        paypal.minicart.render({
            action: '#'
        });
    
        if (~window.location.search.indexOf('reset=true')) {
            paypal.minicart.reset();
        }
    </script>
    
        <!-- //cart-js --> 
        <!-- single -->
    <script src="js/imagezoom.js"></script>
    <!-- single -->
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
    <!-- FlexSlider -->
    <script src="js/jquery.flexslider.js"></script>
                            <script>
                            // Can also be used with $(document).ready()
                                $(window).load(function() {
                                    $('.flexslider').flexslider({
                                    animation: "slide",
                                    controlNav: "thumbnails"
                                    });
                                });
                            </script>
                        <!-- //FlexSlider-->
    <!-- //script for responsive tabs -->		
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