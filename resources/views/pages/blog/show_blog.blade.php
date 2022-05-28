@extends('layout')
@section('content')
<main class="main">
        	<div class="page-header text-center" style="background-image: url(public/frontend/images/page-header-bg.jpg)">
        		<div class="container">
        			<h1 class="page-title"><span>Blog</span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/Home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <nav class="blog-nav">
                        <ul class="menu-cat entry-filter justify-content-center">
                            <li class="active"><a href="{{URL::to('/blog')}}" data-filter="*">Tất Cả</a></li>
                            @foreach($category_post as $key => $value)
                                <li><a href="{{URL::to('/blog/'.$value->category_post_slug)}}" data-filter=".lifestyle">{{$value->category_post_name}}</a></li>
                            @endforeach
                        </ul><!-- End .blog-menu -->
                    </nav><!-- End .blog-nav -->

                	<div class="entry-container max-col-3" data-layout="fitRows">
                        @foreach($post as $key=>$value)
                            <div class="entry-item lifestyle shopping col-sm-6 col-lg-4">
                                <article class="entry entry-grid text-center">
                                    <figure class="entry-media">
                                        <a href="{{URL::to('/blog-details/'.$value->post_slug)}}">
                                            <img src="{{asset('public/upload/post/'.$value->post_image)}}" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->

                                    <div class="entry-body">
                                        <div class="entry-meta">
                                            <span class="entry-author">
                                                Bởi <a href="#">Admin</a>
                                            </span>
                                            <span class="meta-separator">|</span>
                                            <a href="#">{{$value->created_date}}</a>
                                        </div><!-- End .entry-meta -->

                                        <h2 class="entry-title">
                                            <a href="{{URL::to('/blog-details/'.$value->post_slug)}}">{{$value->post_title}}</a>
                                        </h2><!-- End .entry-title -->

                                        <div class="entry-cats">
                                            in <a href="#">Lifestyle</a>,
                                            <a href="#">Shopping</a>
                                        </div><!-- End .entry-cats -->

                                        <div class="entry-content">
                                            <p>{!!$value->post_desc!!}</p>
                                            <a href="{{URL::to('/blog-details/'.$value->post_slug)}}" class="read-more">Tiếp tục đọc</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </article><!-- End .entry -->
                            </div><!-- End .entry-item -->
                        @endforeach
                	</div><!-- End .entry-container -->


                    <nav aria-label="Page navigation" style="justify-content: center;display: flex;">
                                {{ $post->links("pagination::bootstrap-4") }}
					</nav>
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
@endsection
