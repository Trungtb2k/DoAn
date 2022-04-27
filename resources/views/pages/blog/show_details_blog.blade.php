@extends('layout')
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
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
                                            by <a href="#">Admin</a>
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a href="#">Nov 22, 2018</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        {!!$value->post_title!!}
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        in <a href="#">Lifestyle</a>,
                                        <a href="#">Shopping</a>
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
                                <h3 class="title">Related Posts</h3><!-- End .title -->

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
                                            <a href="single.html">
                                                <img src="assets/images/blog/grid/3cols/post-1.jpg" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->

                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <a href="#">Nov 22, 2018</a>
                                                <span class="meta-separator">|</span>
                                                <a href="#">2 Comments</a>
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="single.html">Cras ornare tristique elit.</a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats">
                                                in <a href="#">Lifestyle</a>,
                                                <a href="#">Shopping</a>
                                            </div><!-- End .entry-cats -->
                                        </div><!-- End .entry-body -->
                                    </article><!-- End .entry -->

                                </div><!-- End .owl-carousel -->
                            </div><!-- End .related-posts -->

                            <div class="comments">
                                <h3 class="title">3 Comments</h3><!-- End .title -->

                                <ul>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a href="#">
                                                    <img src="assets/images/blog/comments/1.jpg" alt="User name">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <a href="#" class="comment-reply">Reply</a>
                                                <div class="comment-user">
                                                    <h4><a href="#">Jimmy Pearson</a></h4>
                                                    <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. </p>
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->

                                        <ul>
                                            <li>
                                                <div class="comment">
                                                    <figure class="comment-media">
                                                        <a href="#">
                                                            <img src="assets/images/blog/comments/2.jpg" alt="User name">
                                                        </a>
                                                    </figure>

                                                    <div class="comment-body">
                                                        <a href="#" class="comment-reply">Reply</a>
                                                        <div class="comment-user">
                                                            <h4><a href="#">Lena  Knight</a></h4>
                                                            <span class="comment-date">November 9, 2018 at 2:19 pm</span>
                                                        </div><!-- End .comment-user -->

                                                        <div class="comment-content">
                                                            <p>Morbi interdum mollis sapien. Sed ac risus.</p>
                                                        </div><!-- End .comment-content -->
                                                    </div><!-- End .comment-body -->
                                                </div><!-- End .comment -->
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </div><!-- End .comments -->
                            <div class="reply">
                                <div class="heading">
                                    <h3 class="title">Đánh giá</h3><!-- End .title -->
                                    <p class="title-desc">Bạn cảm thấy bài viết này như thế nào?</p>
                                </div><!-- End .heading -->

                                <form action="#">
                                    <label for="reply-message" class="sr-only">Comment</label>
                                    <textarea name="reply-message" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Mời bạn chia sẻ thêm một số cảm nhận ... *"></textarea>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="reply-name" class="sr-only">Name</label>
                                            <input type="text" class="form-control" id="reply-name" name="reply-name" required placeholder="Họ và tên *">
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <label for="reply-email" class="sr-only">Email</label>
                                            <input type="email" class="form-control" id="reply-email" name="reply-email" required placeholder="Email *">
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Bình luận</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- End .reply -->
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
