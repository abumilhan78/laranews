@extends('themes.main.master')

@section('content')
<div id="colorlib-container">
    <div class="container">
        <div class="row">
            <div class="col-md-9 content">
                <div class="row row-pb-lg">
                    <div class="col-md-12">
                        <div class="blog-entry">
                            <div class="blog-img blog-detail">
                            <img src="{{asset("storage/".$article[0]['image'])}}" class="img-responsive" alt="html5 bootstrap template">
                            </div>
                            <div class="desc">
                                <p class="meta">
                                    <span class="cat"><a href="#">{{$article[0]['category']['title']}}</a></span>
                                    <span class="date">{{date_format($article[0]['created_at'], 'd F Y')}}</span>
                                    <span class="pos">By <a href="#">{{$article[0]['user']['name']}}</a></span>
                                </p>
                            <h2><a href="#">{{$article[0]['title']}}</a></h2>
                                <div>
                                    {!! $article[0]['description'] !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar">
                    <div class="side">
                        <h2 class="sidebar-heading">Categories</h2>
                        <p>
                            <ul class="category">
                                @foreach ($category as $key)
                                <li><a href="#">@if($article[0]['category']['title'] == $key->title)<i class="icon-check"></i>@endif {{$key->title}}</a></li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection