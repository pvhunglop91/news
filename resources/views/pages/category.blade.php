@extends('layout.index')
@section('content')
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        @if(isset($categoryNameUrl->name))
                            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4"> Thể Loại: {{$categoryNameUrl->name}}</div>
                        @endif
                    </div>
                    @foreach($dataPage as $n)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{'storage/images/'.$n->image}}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a  href="news/{{$n->title_url}}" class="fh5co_magna py-2"> {{$n->title}}</a>
                                <div>  <a class="fh5co_mini_time py-3">{{$n->created_at}}</a> </div>
                                <div class="fh5co_consectetur">{!!$n->summary!!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div  style ="text-align: center;" >
                        {{ $dataPage->links() }}
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Loại tin</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach($typeOfNews as $t)
                            <a href="typeOfNews/{{$t->name_url}}" class="fh5co_tagg">{{$t->name}}</a>
                        @endforeach
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Tin tức mới</div>
                    </div>
                    <div>
                        @foreach($data->all() as $news1)
                            <div class="row pb-3">
                                <div class="col-5 align-self-center">
                                    <img src="{{'storage/images/'.$news1['image']}}" alt="img" class="fh5co_most_trading"/>
                                </div>
                                <div class="col-7 paddding">
                                    <a href="news/{{$news1->title_url}}" class="d-block fh5co_small_post_heading"> {{$news1['title']}}</a>
                                    <div class="most_fh5co_treding_font_123"> {{$news1['created_at']}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Nổi bật</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach($dataTrending->all() as $newsTrending)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{'storage/images/'.$newsTrending['image']}}" alt=""/></div>
                            <div>
                                <a href="news/{{$newsTrending->title_url}}" class="d-block fh5co_small_post_heading"><span class="">{{$newsTrending['title']}}</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> {{$newsTrending['created_at']}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
