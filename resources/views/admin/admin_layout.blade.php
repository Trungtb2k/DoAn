<!DOCTYPE html>

<head>
    <title>DashBoard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>


</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo">
                    Admin
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{asset('public/backend/images/2.png')}}">
                            <span class="username">
                                <?php

                                use Illuminate\Support\Facades\Session;

                                $name = Session::get('admin_name');
                                if ($name) {
                                    echo $name;
                                }
                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="{{URL::to('/admin-logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{URL::to('/dashboard')}}">
                                <i class="fa fa-dashboard"></i>
                                <span>Trang chủ</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh mục sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
                                <li><a href="{{URL::to('/list-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Thương hiệu</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu</a></li>
                                <li><a href="{{URL::to('/list-brand-product')}}">Liệt kê thương hiệu</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Bài viết</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-post')}}">Thêm bài viết</a></li>
                                <li><a href="{{URL::to('/list-post')}}">Liệt kê bài viết</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                                <li><a href="{{URL::to('/list-product')}}">Liệt kê sản phẩm</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Chi tiết sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-product-details')}}">Thêm chi tiết sản phẩm</a></li>
                                <li><a href="{{URL::to('/list-product-details')}}">Liệt kê chi tiết</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Đặt hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/manager-order')}}">Quản lý đặt hàng</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Bình luận</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/list-comment')}}">Liệt kê bình luận</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Mã giảm giá</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-coupon')}}">Thêm mã giảm giá</a></li>
                                <li><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
            </section>


            <!--main content end-->
        </section>


        <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
        <script src="{{asset('public/backend/js/scripts.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
        <script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


        <script type="text/javascript">
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: "yy-mm-dd"
                });

                $("#datepicker2").datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                chart30daysorder();
                var chart = new Morris.Line({
                    element: 'myfirstchart',
                    //option
                    lineColors: ['#888bf7', '#75ff00', '#FF6541', '#ff0000', '#766856'],
                    pointFillColors: ['#ffffff'],
                    pointStrokeColors: ['black'],
                        fillOpacity: 0.3,
                        hideHover: 'auto',
                        parseTime: false,
                    xkey: 'period',
                    ykeys: ['order','sales','profit','quantity'],
                    behaveLikeLine: true,
                    labels: ['đơn hàng','doanh số','lợi nhuận','số lượng']
                });

                $('.btn_dashboard_filter').click(function(){
                    var from_date = $('#datepicker').val();
                    var to_date = $('#datepicker2').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url('/filter-by-date')}}",
                        method:"POST",
                        dataType:"JSON",
                        data:{from_date:from_date,to_date:to_date,_token:_token},
                        success:function(data){
                            chart.setData(data);
                        }
                    });

                });

                $('.dashboard-filter').change(function(){
                    var dashboard_value = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url('/dashboard-filter')}}",
                        method:"POST",
                        dataType:"JSON",
                        data:{dashboard_value:dashboard_value,_token:_token},
                        success:function(data){
                            chart.setData(data);
                        }
                    });

                });

                function chart30daysorder(){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url('/days-order')}}",
                        method:"POST",
                        dataType:"JSON",
                        data:{_token:_token},
                        success:function(data){
                            chart.setData(data);
                        }
                    });
                }


            });
        </script>

        <script type="text/javascript">
            $(document).ready(function() {
                load_gallery();

                function load_gallery() {
                    var pro_id = $('.pro_id').val();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{url('/select-gallery')}}",
                        method: "POST",
                        data: {
                            pro_id: pro_id,
                            _token: _token
                        },
                        success: function(data) {
                            $('#gallery_load').html(data);
                        }
                    })

                }
                $('#file').change(function() {
                    var error = '';
                    var files = $('#file')[0].files;
                    if (files.length > 5) {
                        error += '<p>Error</p>';
                    } else if (files.length == '') {
                        error += '<p>Not null</p>';
                    }

                    if (error == '') {

                    } else {
                        $('#file').val('');
                        $('#error_gallery').html('<span class="text-danger">' + error + '</span>');
                        return false;
                    }
                });

                $(document).on('blur', '.edit_gal_name', function() {
                    var gal_id = $(this).data('gal_id');
                    var gal_text = $(this).text();
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{url('/update-gallery-name')}}",
                        method: "POST",
                        data: {
                            gal_id: gal_id,
                            gal_text: gal_text,
                            _token: _token
                        },
                        success: function(data) {
                            load_gallery();
                            $('#error_gallery').html('<span class="text-danger">Update Successful</span>');
                        }
                    })
                });

                $(document).on('click', '.delete-gallery', function() {
                    var gal_id = $(this).data('gal_id');
                    var _token = $('input[name="_token"]').val();
                    if (confirm('Do you want to delete the image?')) {

                        $.ajax({
                            url: "{{url('/delete-gallery')}}",
                            method: "POST",
                            data: {
                                gal_id: gal_id,
                                _token: _token
                            },
                            success: function(data) {
                                load_gallery();
                                $('#error_gallery').html('<span class="text-danger">Delete Successful</span>');
                            }
                        })
                    }
                });

                $(document).on('change', '.file_image', function() {
                    var gal_id = $(this).data('gal_id');
                    var image = document.getElementById('file-' + gal_id).files[0];

                    var form_data = new FormData();
                    form_data.append("file", document.getElementById('file-' + gal_id).files[0]);
                    form_data.append("gal_id", gal_id);


                    $.ajax({
                        url: "{{url('/update-gallery')}}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data) {
                            load_gallery();
                        }
                    })

                });
            });
        </script>


        <!-- calendar -->
        <script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
        <script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
        <script>
            CKEDITOR.replace('ckeditor');
            CKEDITOR.replace('ckeditor1');
            CKEDITOR.replace('ckeditor2');
        </script>

        <script type="text/javascript">
            $(window).load(function() {

                $('#mycalendar').monthly({
                    mode: 'event',

                });

                $('#mycalendar2').monthly({
                    mode: 'picker',
                    target: '#mytarget',
                    setWidth: '250px',
                    startHidden: true,
                    showTrigger: '#mytarget',
                    stylePast: true,
                    disablePast: true
                });

                switch (window.location.protocol) {
                    case 'http:':
                    case 'https:':
                        // running on a server, should be good.
                        break;
                    case 'file:':
                        alert('Just a heads-up, events will not work when run locally.');
                }

            });
        </script>

        <script>
            $('.order_details').change(function() {
                var order_status = $(this).val();
                var order_id = $(this).children(":selected").attr("id");
                var _token = $('input[name="_token"]').val();

                quantity = [];
                $("input[name='product_sales_quantity']").each(function() {
                    quantity.push($(this).val());
                });

                order_product_id = [];
                $("input[name='order_product_id']").each(function() {
                    order_product_id.push($(this).val());
                });

                $.ajax({
                    url: "{{url('/update-order-qty')}}",
                    method: "POST",
                    data: {
                        order_status: order_status,
                        order_id: order_id,
                        quantity: quantity,
                        _token: _token,
                        order_product_id: order_product_id
                    },
                    success: function(data) {
                        location.reload();
                    }
                });
            })
        </script>
        <!-- //calendar -->
</body>

</html>
