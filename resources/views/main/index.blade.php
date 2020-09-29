@extends('themes.main.master')

@section('jumbotron')
<aside id="colorlib-hero">
    <div class="flexslider">
        <ul class="slides">
            @foreach ($article as $key)
            <li style="background-image: url({{asset("storage/".$key->image)}});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
                            <div class="slider-text-inner">
                                <div class="desc" style="border-top-right-radius: 25px">
                                    <p class="meta">
                                         <span class="cat"><a href="#">{{$key->category->title}}</a></span>
                                         <span class="date">{{date_format($key->created_at, 'd F Y')}}</span>
                                         <span class="pos">By <a href="">{{$key->user->name}}</a></span>
                                     </p>
                                    <h1>{{$key->title}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
          </ul>
      </div>
</aside>



@endsection

@section('content')
@foreach ($article as $key)
<div class="col-md-4">
    <div class="blog-entry" style="margin-bottom: 20px;">
        <div class="blog-img">
            <a href="{{route('main.show', $key->id)}}"><img src="{{asset("storage/".$key->image)}}" class="img-responsive" alt="html5 bootstrap template" style="border-radius:15px; width:700px; height:220px; transition:1.6s;"></a>
        </div>
        <div class="desc" style="border-top-right-radius: 25px">
            <p class="meta">
                <span class="cat"><a href="#">{{$key->category->title}}</a></span>
                <span class="date">{{date_format($key->created_at, 'd F Y')}}</span>
                <span class="pos">By <a href="#">{{$key->user->name}}</a></span>
            </p>
            <h2><a href="blog.html">{{$key->title}}</a></h2>
            <div style="
            width: 100%;
            height: 100px;
            overflow: hidden;">{!!$key->description!!}</div>
        </div>
    </div>					
</div>
@endforeach

@endsection