@extends('layout.index')

@section('content')
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <p>
                    <h1><b> {{$newsUrl->title}}</b></h1>
                    </p>
                    <p class="fa fa-eye">
                        {{$newsUrl->view}}
                    </p>
                    <div>
                        <p class="fa fa-clock-o">
                            {{$newsUrl->created_at}}
                        </p>
                    </div>
                    <p><img src="{{'storage/images/'.$newsUrl->image}}"  width="700px" height="400px"></p>
                    <p>
                        {!!$newsUrl->content!!}
                    </p>
                </div>
                <div class="col-md-4 animate-box" data-animate-effect="fadeInRight">
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
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Tin liên quan</div>
                    </div>
                        @foreach($newsRelated as $r)
                            <div class="row pb-3">
                                <div class="col-5 align-self-center">
                                    <img src="{{'storage/images/'.$r->image}}"  class="fh5co_most_trading"/>
                                </div>
                                <div class="col-7 paddding">
                                    <a href="news/{{$r->title_url}}" class="d-block fh5co_small_post_heading"> {{$r->title}}.</a>
                                    <div class="most_fh5co_treding_font_123">{{$r->created_at}}</div>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Comments Form -->
    @if(Auth::user())
        <div  class="container ">
            <h4>Bình luận <span class="glyphicon glyphicon-pencil"></span></h4>
            <form role="form" action="comment/{{$newsUrl->id}}" method="POST">
                <input type="hidden"   name="_token" value="{{csrf_token()}}" />
                <!-- <b><b> -->
                @if($errors->has('content'))
                    <div class="error text-danger">Bình luận phải chứa ít nhất 2 ký tự</div>
                @endif
                <div class="form-group">
                    <textarea  class="form-control" placeholder="Write Comment" name="content" rows="3" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    @endif
    <!-- Posted Comments -->

    <!-- Comment -->
    @foreach($newsUrl->newsComment as $cm)
        <div class="container ">
            <hr>
            <div class="mr-3">
            <a class="pull-left mr-3" >
                <img  width="64px" height="64px" src="image/avatar_logo.jpg" alt="">
            </a>
            </div>
            <div class="ml-4">
                <h4 >{{$cm->commentUser->name}}
                    <h6><small>{{$cm ->created_at}}</small></h6>

                </h4>
                {{$cm->content}}
            </div>
        </div>
    @endforeach
    <!-- Comment -->
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Nổi Bật</div>
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
