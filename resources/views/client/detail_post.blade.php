@extends('client.layout.master')
@section('content')
<div class="container mt-5">
  <div class="col-md-8 about-left">
    <div class="single-top">
      <a href="#">
        <img class="single-top-img" src="../../../{{$posts->image}}" alt=" ">
      </a>
      <div class=" single-grid">
        <h4 class="text-center">{{$posts->title}}</h4>				
        <p>{!!$posts->content!!}</p>
      </div>
    </div>
{{-- comment --}}
  <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
      <div class="container">
        <div class="headings d-flex justify-content-between align-items-center mb-3">
          @if (!empty($comments))
            <h2>
              <strong>Comment</strong>
            </h2>              
          @endif
        </div>

      @foreach ($comments as $comment)
      @if ($comment->post_id == $posts->id)
        <div class="card p-3 mt-2">
          <div class="d-flex justify-content-between align-items-center">
            <div class="user d-flex flex-row align-items-center">
              <img src="../../../{{$comment->users->image}}" width="30" class="user-img rounded-circle mr-2">
              <span><small class="font-weight-bold text-primary">
                {{$comment->users->name}}  
              </small> <small class="font-weight-bold">{{$comment->content}}</small></span>
            </div>
          </div>
          <div class="action d-flex justify-content-between mt-2 align-items-center">
            <div class="reply px-4">
              <a href="">
                <small>Xóa</small>
                <span class="dots"></span>
              </a>
              <a href="">
                <small id="reply">Trả lời</small>
                <span class="dots"></span>
              </a>
              <a href="">
                <small>Sửa</small>
              </a>
            </div>
            <div class="icons align-items-center">
                <i class="fa fa-check-circle-o check-icon text-primary"></i>
            </div>
          </div>
        </div>
      @endif
      @endforeach
      </div>
    </div>
  </div>

                  {{--rep comment  --}}

                  {{--end rep comment  --}}

  @if (Auth::check())
    <form action="{{route('client.comment.store')}}" method="POST">
      @csrf
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      <input type="hidden" name="post_id" value="{{$posts->id}}">
      <input type="hidden" name="parent_id" value="0">
      <input type="hidden" name="status" value="{{Auth::user()->role == 1 ? 1 : 0}}">
      <div class="container pb-5">
        <textarea name="content" class="form-control" id="" cols="20" rows="4" placeholder="Comment..."></textarea>
      </div>
        <button type="submit" class="mb-10 inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
          Comment
        </button>
    </form>
  @endif
  </div>	

  <div class="col-md-4 about-right heading">
    <div class="abt-2">
            <h3>Bài viết nổi bật</h3>
            @foreach ($hightlight_posts as $hightlight_post)
              <div class="might-grid pl-20">
                <div class="grid-might">
                  <a href="{{route('client.detail_post', $hightlight_post->id)}}">
                    <img src="../../../{{$hightlight_post->image}}" class="img-responsive" alt="">
                  </a>
                </div>
                <div class="might-top">
                  <h4><a href="{{route('client.detail_post', $hightlight_post->id)}}">
                    {{$hightlight_post->title}}
                  </a></h4>
                  <p style="white-space: nowrap; width: 200px; overflow:hidden">
                    {{$hightlight_post->description}}
                </p>
                </div>
                <div class="clearfix"></div>
              </div>	
            @endforeach
          </div>
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