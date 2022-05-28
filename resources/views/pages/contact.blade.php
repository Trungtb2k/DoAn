@extends('layout')
@section('content')
<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/Home')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
	        	<div class="page-header page-header-big text-center" style="background-image: url('public/frontend/images/contact-header-bg.jpg')">
        			<h1 class="page-title text-white">Liên hệ<span class="text-white">Liên lạc với chúng tôi</span></h1>
	        	</div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<h2 class="title mb-1">Thông tin liên hệ</h2><!-- End .title mb-2 -->
                			<p class="mb-3">Molla - Điện thoại, laptop, tablet, phụ kiện chính hãng.</p>
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>Văn phòng</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-map-marker"></i>
	                							Số 3 đường Cầu Giấy, phường Láng Thượng, Đống Đa, Hà Nội
	                						</li>
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:#">+123 456 789</a>
                							</li>
                							<li>
                								<i class="icon-envelope"></i>
                								<a href="mailto:#">info@Molla.gq</a>
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				<div class="col-sm-5">
                					<div class="contact-info">
                						<h3>Thời gian</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-clock-o"></i>
	                							<span class="text-dark">Thứ 2 - Thứ 7</span> <br>11am-7pm
	                						</li>
                							<li>
                								<i class="icon-calendar"></i>
                								<span class="text-dark">Chủ nhật</span> <br>11am-6pm
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-5 -->
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">
                            <h2 class="title mb-1">Nếu bạn có câu hỏi?</h2><!-- End .title mb-2 -->
                            <p class="mb-2">Hãy gửi tin nhắn cho chúng tôi</p>

                            <form action="#" class="contact-form mb-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cname" class="sr-only">Họ tên</label>
                                        <input type="text" class="form-control" id="cname" placeholder="Họ tên *" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                                        <input type="email" class="form-control" id="cemail" placeholder="Email *" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Số điện thoại</label>
                                        <input type="tel" class="form-control" id="cphone" placeholder="Số điện thoại">
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="csubject" class="sr-only">Tiêu đề</label>
                                        <input type="text" class="form-control" id="csubject" placeholder="Tiêu đề">
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Nội dung</label>
                                <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Nội dung *"></textarea>

                                <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                    <span>Gửi</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form><!-- End .contact-form -->
                        </div><!-- End .col-lg-6 -->

                	</div><!-- End .row -->

                	<hr class="mt-4 mb-5">


                </div><!-- End .container -->
            	<div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.0978586729248!2d105.80095071427002!3d21.028770085998367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab422e5057e3%3A0xdc775192ca404290!2zMyDEkC4gQ-G6p3UgR2nhuqV5LCBOZ-G7jWMgS2jDoW5oLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1653637715107!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End #map -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
