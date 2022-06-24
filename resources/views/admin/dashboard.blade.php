@extends('admin.admin_layout')
@section('admin_content')
<!-- //market-->

<!-- //market-->
<form>
    @csrf
    <div class="row">
        <div class="panel-body">
            <div class="col-md-12 w3ls-graph">
                <!--agileinfo-grap-->
                <div class="agileinfo-grap">
                    <div class="agileits-box">
                        <header class="agileits-box-header clearfix">
                            <h3>Visitor Statistics</h3>
                            <div class="toolbar">


                            </div>
                        </header>
                        <div class="agileits-box-body clearfix">
                            <div id="hero-area"></div>
                        </div>
                    </div>
                </div>
                <!--//agileinfo-grap-->

            </div>
        </div>
    </div>
</form>
<div class="agil-info-calendar">
    <!-- tasks -->
    <div class="agile-last-grids">
        <form>
            @csrf
            <div class="col-md-4 agile-last-left">
                <div class="agile-last-grid">
                    <div class="area-grids-heading">
                        <h3>Monthly</h3>
                    </div>
                    <div id="graph7"></div>


                </div>
            </div>
        </form>
        <form>
            @csrf
            <div class="col-md-4 agile-last-left agile-last-middle">
                <div class="agile-last-grid">
                    <div class="area-grids-heading">
                        <h3>Daily</h3>
                    </div>
                    <div id="graph8"></div>
                </div>
            </div>
        </form>

        <form>
            @csrf
            <div class="col-md-4 agile-last-left agile-last-right">
                <div class="agile-last-grid">
                    <div class="area-grids-heading">
                        <h3>Yearly</h3>
                    </div>
                    <div id="graph9"></div>

                </div>
            </div>
        </form>
        <div class="clearfix"> </div>
    </div>

    <div class="agil-info-calendar">
        <!-- tasks -->
        <div class="agile-last-grids">

            <div class="col-md-4 agile-last-left">
                <div class="agile-last-grid">
                    <div class="area-grids-heading">
                        <h3>Sản phẩm bán chạy</h3>
                    </div>
                    <table class="table table-dark table-hover">

                        <tbody>
                            @foreach($hot_product as $key => $hot)
                                <tr>
                                    <td><a target="_blank" href="{{URL::to('/product-details/'.$hot->product_id.'/'.$hot->attr_id)}}">{{$hot->product_name}}</a></td>
                                    <td>{{$hot->product_sold}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>

            <div class="col-md-4 agile-last-left agile-last-middle">
                <div class="agile-last-grid">
                    <div class="area-grids-heading">
                        <h3>Sản phẩm xem nhiều</h3>
                    </div>
                    <table class="table table-dark table-hover">

                        <tbody>
                            @foreach($hot_view_product as $key => $view_product)
                                <tr>
                                    <td><a target="_blank" href="{{URL::to('/product-details/'.$view_product->product_id.'/'.$view_product->attr_id)}}">{{$view_product->product_name}}</a></td>
                                    <td>{{$view_product->product_views}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-4 agile-last-left agile-last-right">
                <div class="agile-last-grid">
                    <div class="area-grids-heading">
                        <h3>Bài viết xem nhiều</h3>
                    </div>
                    <table class="table table-dark table-hover">

                        <tbody>
                            @foreach($hot_post as $key => $post)
                                <tr>
                                    <td><a href="{{URL::to('/blog-details/'.$post->post_slug)}}"><input value="{{$post->post_title}}" disabled></input></a></td>
                                    <td>{{$post->post_views}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

            <div class="clearfix"> </div>
        </div>


        <!-- //tasks -->
        @endsection
