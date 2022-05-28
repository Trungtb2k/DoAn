@extends('layout')
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url('public/frontend/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Về chúng tôi</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/Home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Về chúng tôi</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1">
                            <div class="about-text text-center mt-3">
                                <h2 class="title text-center mb-2">Chúng tôi là</h2><!-- End .title text-center mb-2 -->
                                <p>Molla - là nhà bán lẻ hàng đầu, chuyên cung cấp các sản phẩm công nghệ chính hãng tại thị trường Việt Nam. Với khẩu hiệu “Nếu những gì chúng tôi không có, nghĩa là bạn không cần”, chúng tôi đã, đang và sẽ tiếp tục nỗ lực đem đến các sản phẩm công nghệ chính hãng đa dạng, phong phú đi kèm mức giá tốt nhất phục vụ nhu cầu của quý khách hàng. </p>
                                <img src="{{('public/frontend/images/signature.png')}}" alt="signature" class="mx-auto mb-5">

                                <img src="{{('public/frontend/images/slide-3.png')}}" alt="image" class="mx-auto mb-6">
                            </div><!-- End .about-text -->
                        </div><!-- End .col-lg-10 offset-1 -->
                    </div><!-- End .row -->
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-puzzle-piece"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Chất lượng sản phẩm</h3><!-- End .icon-box-title -->
                                    <p>Luôn cung cấp  những sản phẩm tốt nhất.</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-life-ring"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Hỗ trợ</h3><!-- End .icon-box-title -->
                                    <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn mọi lúc mọi nơi.</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->

                        <div class="col-lg-4 col-sm-6">
                            <div class="icon-box icon-box-sm text-center">
                                <span class="icon-box-icon">
                                    <i class="icon-heart-o"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Bảo hành</h3><!-- End .icon-box-title -->
                                    <p>Molla rất xin lỗi vì sự cố khiến điện thoại của quý khách bị hỏng và phải đi bảo hành.</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-lg-4 col-sm-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->

                <div class="bg-light-2 pt-6 pb-7 mb-6">
                    <div class="container">
                        <h2 class="title text-center mb-4">Nhóm của tôi</h2><!-- End .title text-center mb-2 -->

                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="member member-2 text-center">
                                    <figure class="member-media">
                                        <img src="https://scontent.fhan2-2.fna.fbcdn.net/v/t1.6435-9/69322442_588082924931290_528137491140575232_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lEIRP9isAgMAX__97Ts&tn=9mPtRo2Ba-v8xd0h&_nc_ht=scontent.fhan2-2.fna&oh=00_AT8jUWYGgILBCxPKEppBR_x8ZUwzLrr_qqm03ZtZQJE-Kw&oe=62B68653" alt="member photo">
                                        <figcaption class="member-overlay">
                                            <div class="social-icons social-icons-simple">
                                                <a href="https://www.facebook.com/trungbui.0710" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </figcaption><!-- End .member-overlay -->
                                    </figure><!-- End .member-media -->
                                    <div class="member-content">
                                        <h3 class="member-title">Trung Bui<span>Founder & CEO</span></h3><!-- End .member-title -->
                                    </div><!-- End .member-content -->
                                </div><!-- End .member -->
                            </div><!-- End .col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="member member-2 text-center">
                                    <figure class="member-media">
                                        <img src="https://scontent.fhan2-1.fna.fbcdn.net/v/t39.30808-6/282021548_1245452959321817_4432934175582761036_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=RiUL1Mgi5U4AX_7DQwl&_nc_ht=scontent.fhan2-1.fna&oh=00_AT_vEYbOYV3YfKnNs-StnIPxv0IPTbAO3cL7TAdbQrwRmQ&oe=62955145" alt="member photo">

                                        <figcaption class="member-overlay">
                                            <div class="social-icons social-icons-simple">
                                                <a href="https://www.facebook.com/dangblue.231" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </figcaption><!-- End .member-overlay -->
                                    </figure><!-- End .member-media -->
                                    <div class="member-content">
                                        <h3 class="member-title">Dang Hai<span>Sales & Marketing Manager</span></h3><!-- End .member-title -->
                                    </div><!-- End .member-content -->
                                </div><!-- End .member -->
                            </div><!-- End .col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="member member-2 text-center">
                                    <figure class="member-media">
                                        <img src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.6435-9/149597553_2776097182654588_1952936442453048471_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=Qq72xiUv2XsAX9S845c&_nc_ht=scontent.fhan2-3.fna&oh=00_AT-WFhwAW84g4Wt7z-I4n3a2I4nwbNGU9BnOtdYSGy__Ig&oe=62B71C84" alt="member photo">

                                        <figcaption class="member-overlay">
                                            <div class="social-icons social-icons-simple">
                                                <a href="https://www.facebook.com/profile.php?id=100007630006438" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </figcaption><!-- End .member-overlay -->
                                    </figure><!-- End .member-media -->
                                    <div class="member-content">
                                        <h3 class="member-title">Giang Dam<span>Product Manager</span></h3><!-- End .member-title -->
                                    </div><!-- End .member-content -->
                                </div><!-- End .member -->
                            </div><!-- End .col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="member member-2 text-center">
                                    <figure class="member-media">
                                        <img src="https://scontent.fhan2-4.fna.fbcdn.net/v/t39.30808-6/271759662_1093956804756649_4219918811053452989_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=AWK68pe88isAX9xT0JX&_nc_ht=scontent.fhan2-4.fna&oh=00_AT86KDl2LYDVAlE5pIN0hZY_gjG8Li41pVEx1pg18xtV3g&oe=629608C0" alt="member photo">

                                        <figcaption class="member-overlay">
                                            <div class="social-icons social-icons-simple">
                                                <a href="https://www.facebook.com/profile.php?id=100024270182669" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </figcaption><!-- End .member-overlay -->
                                    </figure><!-- End .member-media -->
                                    <div class="member-content">
                                        <h3 class="member-title">Truc Nguyen<span>Product Manager</span></h3><!-- End .member-title -->
                                    </div><!-- End .member-content -->
                                </div><!-- End .member -->
                            </div><!-- End .col-lg-3 -->

                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .bg-light-2 pt-6 pb-6 -->


            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
