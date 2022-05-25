@extends('layout')
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url('../public/frontend/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Bài viết</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            @foreach($post as $key => $value)
                            <article class="entry single-entry">
                                <figure class="entry-media">
                                    <img src="{{asset('public/upload/post/'.$value->post_image)}}" alt="image desc">
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            Bởi <a href="#">Admin</a>
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a href="#">Nov 22, 2018</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        {!!$value->post_title!!}
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        <a href="{{URL::to('/blog/'.$value->category_post_slug)}}">{{$value->category_post_name}}</a>
                                    </div><!-- End .entry-cats -->

                                    <div class="entry-content editor-content">
                                        {!!$value->post_content!!}
                                    </div><!-- End .entry-content -->

                                    <div class="entry-footer row no-gutters flex-column flex-md-row">
                                        <div class="col-md">
                                            <div class="entry-tags">
                                                <span>Tags:</span> <a href="#">photography</a> <a href="#">style</a>
                                            </div><!-- End .entry-tags -->
                                        </div><!-- End .col -->

                                        <div class="col-md-auto mt-2 mt-md-0">
                                            <div class="social-icons social-icons-color">
                                                <span class="social-label">Share this post:</span>
                                                <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                                <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .entry-footer row no-gutters -->
                                </div><!-- End .entry-body -->


                            </article><!-- End .entry -->
                            @endforeach


                            <div class="related-posts">
                                <h3 class="title">Bài viết liên quan</h3><!-- End .title -->
                                @foreach($post_release as $key => $release)
                                <div class="owl-carousel owl-simple" data-toggle="owl"
                                    data-owl-options='{
                                        "nav": false,
                                        "dots": true,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":1
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            }
                                        }
                                    }'>
                                    <article class="entry entry-grid">
                                        <figure class="entry-media">
                                            <a href="{{URL::to('/blog-details/'.$release->post_slug)}}">
                                                <img src="{{asset('public/upload/post/'.$release->post_image)}}" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Admin</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">Nov 22, 2018</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="{{URL::to('/blog-details/'.$release->post_slug)}}">{{$release->post_title}}</a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats">
                                                <a href="{{URL::to('/blog/'.$release->category_post_slug)}}">{{$release->category_post_name}}</a>
                                            </div><!-- End .entry-cats -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->

                                </div><!-- End .owl-carousel -->
                                @endforeach
                            </div><!-- End .related-posts -->
                		</div><!-- End .col-lg-9 -->

                		<aside class="col-lg-3">
                			<div class="sidebar">
                				<div class="widget widget-search">
                                    <h3 class="widget-title">Tìm kiếm</h3><!-- End .widget-title -->

                                    <form action="#">
                                        <label for="ws" class="sr-only">Tìm kiếm</label>
                                        <input type="search" class="form-control" name="ws" id="ws" placeholder="Search in blog" required>
                                        <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                                    </form>
                				</div><!-- End .widget -->

                                <div class="widget widget-cats">
                                    <h3 class="widget-title">Danh mục</h3><!-- End .widget-title -->

                                    <ul>
                                        @foreach($category_post as $key => $abc)
                                            <li><a href="{{URL::to('/blog/'.$abc->category_post_slug)}}">{{$abc->category_post_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div><!-- End .widget -->

                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
