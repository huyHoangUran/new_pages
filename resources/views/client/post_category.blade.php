@extends('client.layout.master')
@section('content')
    <div class="container">
        <div class="col-md-8 about-left">
            @if(empty($posts))
            <h2>There are no posts for this category yet!</h2>
            @else
                <div class="about-tre">
                {{-- <h2>{{$categories->name}}</h2> --}}
                    <div class="a-1">
                        @foreach ($posts as $post)
                            <div class="col-md-6 abt-left pb-5">
                                <a href="{{route('client.detail_post', $post->id)}}">
                                    <img src="../../../{{$post->image}}" alt="">
                                </a>
                                <h3><a href="{{route('client.detail_post', $post->id)}}">{{$post->title}}</a></h3>
                                <p>{{$post->description}}</p>
                                <label>{{$post->created_at}}</label>
                            <div class="about-btn">
                                <a href="{{route('client.detail_post', $post->id)}}">Read More</a>
                            </div>
                            </div>
                        @endforeach
                    <div class="clearfix"></div>
                    </div>
                </div>	  
            @endif
        </div>
        <div class="col-md-4 about-right heading">
            <div class="abt-2">
              <h3>Có thể bạn chưa biết</h3>
              @foreach ($posts_same as $post)
                <div class="might-grid pl-20">
                  <div class="grid-might">
                    <a href="{{route('client.detail_post', $post->id)}}">
                      <img src="../../../{{$post->image}}" class="img-responsive" alt="">
                    </a>
                  </div>
                  <div class="might-top">
                    <h4>
                      <a href="{{route('client.detail_post', $post->id)}}">
                        {{$post->title}}
                      </a>
                    </h4>
                    <p style="white-space: nowrap; width: 200px; overflow:hidden">
                      {{$post->description}}
                    </p>
                  </div>
                  <div class="clearfix"></div>
                </div>	
              @endforeach
            </div>
        </div>
    </div>
@endsection