@extends('layout.index')
@section('content')
    <div class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4"> Search: {{$keyword}}</div>
                    </div>
                    @foreach($newsSearched as $n)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{'storage/images/'.$n->image}}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a  href="news/{{$n->title_url}}" class="fh5co_magna py-2"> {{$n->title}} </a>
                                <div>  <a class="fh5co_mini_time py-3"> {{$n->created_at}} </a> </div>
                                <div class="fh5co_consectetur"> {!!$n->summary!!}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div  style ="text-align: center;" >
{{--                        <!-- {{ $newsSearched->links() }} -->--}}
                        {{ $newsSearched->appends(Request::all())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    function changecolor($str, $keyword)
    {
        return preg_filter('/' . preg_quote($keyword, '/') . '/i', '<b><span  class="text-danger">$0</span></b>', $str);
    }
    ?>
@endsection
