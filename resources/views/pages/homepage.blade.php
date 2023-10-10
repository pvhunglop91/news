@extends('layout.index')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row mx-0">
            @if(count($news)>0)
                <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                    @if(isset($newsHeader))
                        <div class="fh5co_suceefh5co_height"><img src="{{'storage/images/'.$newsHeader['image']}}" alt="img"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font">
                                <div class=""><a  class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$newsHeader['created_at']}}
                                    </a></div>
                                <div class=""><a href="news/{{$newsHeader->title_url}}" class="fh5co_good_font">{{$newsHeader['title']}} </a></div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="row">
                        @if(isset($dataHeader,$news))
                            @foreach($dataHeader->all() as $dt)
                                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                                    <div class="fh5co_suceefh5co_height_2"><img src="{{'storage/images/'.$dt['image']}}" alt="img"/>
                                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                            <div class=""><a class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$dt['created_at']}} </a></div>
                                            <div class=""><a href="news/{{$dt['title_url']}}" class="fh5co_good_font_2"> {{$dt['title']}} </a></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
        </div>
        @endif
    </div>
    <div class="container-fluid pt-3">
        <div class="container animate-box mb-4" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Nổi bật</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach($dataTrending->all() as $newsTrending)
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img"><img width="480px" height="230px" src="{{'storage/images/'.$newsTrending['image']}}" alt=""
                                                                       class="fh5co_img_special_relative"/></div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="news/{{$newsTrending->title_url}}" class="text-white">{{$newsTrending['title']}}</a>
                                <div class="fh5co_latest_trading_date_and_name_color">{{$newsTrending['view']}} views</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="container-fluid fh5co_video_news_bg pb-4">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Thời sự</div>
            </div>
            <div>
                <div class="owl-carousel owl-theme" id="slider3">
                    @foreach($videoNews as $v)
                        <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_hover_news_img_video_tag_position_relative">
                                    <div class="fh5co_news_img "  >
                                        {!!$v->path!!}
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <a  class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                        <span class=""> {!!$v->title!!} </span></a>
                                    <div class="c_g"><i class="fa fa-clock-o"></i>{{$v->created_at}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container-fluid paddding"  >
        <div class="container paddding">
            @foreach($category as $c)
            
                @if(count($c->categoryTypeOfNews)>0)
                    <div class="row mx-0">
                        <div class="col-md-9 animate-box" data-animate-effect="fadeInLeft">
                            <div>
                                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                                    <a href="category/{{$c->name_url}}">{{$c->name}}</a>
                                    | @foreach($c->categoryTypeOfNews as $lt)
                                        <small><a href="typeOfNews/{{$lt->name_url}}"><i>{{$lt->name}}</i></a>,</small>
                                    @endforeach
                                </div>
                            </div>
                            <?php
                            $data = $c->categoryNews->where('highlight', 1)->sortByDesc('created_at')->take(4);
                            $news2 = $data->shift();
                            ?>
                            @if(isset($news2))
                                <div class="row pb-4">
                                    <div class="col-md-6">
                                        <div class="fh5co_hover_news_img " >
                                            <div class="fh5co_news_img fh5co_news_img_tiger" ><img  src="{{'storage/images/'.$news2['image']}}"/></div>
                                            <div></div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 animate-box">
                                        <a href="news/{{$news2->title_url}}" class="fh5co_magna py-2"> {!!$news2['title']!!} </a>
                                        <div><a  class="fh5co_mini_time py-3"><i class="fa fa-clock-o"></i> </a>{!!$news2['created_at']!!}</div>
                                        <div class="fh5co_consectetur ">{!!$news2['summary']!!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                            <div>
                                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tin tức liên quan</div>
                            </div>
                            @foreach($data->all() as $newslq)
                                <div class="row pb-3">
                                    <div class="col-5 align-self-center">
                                        <img src="{{'storage/images/'.$newslq['image']}}" alt="img" class="fh5co_most_trading"/>
                                    </div>
                                    <div class="col-7 paddding">
                                        <a href="news/{{$newslq->title_url}}" class="d-block fh5co_small_post_heading"> {!!$newslq['title']!!}</a>
                                        <div class="most_fh5co_treding_font_123">{{$news2['created_at']}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
