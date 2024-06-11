@extends('client.layout.master')
@section('content')
    <div class="about">
        <div class="container">
            <div class="about-main">
                <div class="col-md-8 about-left">
                    <div class="about-one">
                        <a href="{{ route('client.detail_post', $post_hl->id) }}">
                            <h3>{{ $post_hl->title }}</h3>
                        </a>
                    </div>
                    <div class="about-two">
                        <a href="{{ route('client.detail_post', $post_hl->id) }}"><img src="../../../{{ $post_hl->image }}"
                                alt="" /></a>
                        <p>{{ $post_hl->description }}</p>
                        <div class="about-btn">
                            <a href="{{ route('client.detail_post', $post_hl->id) }}">Read More</a>
                        </div>
                    </div>
                    <div class="about-tre">
                        <div class="a-1">
                            @foreach ($posts as $post)
                                <div class="col-md-6 abt-left pb-5">
                                    <a href="{{ route('client.detail_post', $post->id) }}">
                                        <img src="../../../{{ $post->image }}" alt="">
                                    </a>
                                    <h3><a href="{{ route('client.detail_post', $post->id) }}">{{ $post->title }}</a></h3>
                                    <p>{{ $post->description }}</p>
                                    <label>{{ $post->created_at }}</label>
                                    <div class="about-btn">
                                        <a href="{{ route('client.detail_post', $post->id) }}">Read More</a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 about-right heading">
                    <div class="abt-2">
                        <h3>Danh mục bài viết</h3>
                        <div class="might-grid">
                            <div class="might-top">
                                <h4>
                                    @foreach ($categories as $category)
                                        <div class="pb-5">
                                            <strong><a
                                                    href="{{ route('client.post_category', $category->id) }}">{{ $category->name }}</a></strong>
                                        </div>
                                    @endforeach
                                </h4>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="abt-2">
                        <h3>Bài viết nổi bật</h3>
                        @foreach ($hightlight_posts as $hightlight_post)
                            <div class="might-grid pl-20">
                                <div class="grid-might">
                                    <a href="{{ route('client.detail_post', $hightlight_post->id) }}">
                                        <img src="../../../{{ $hightlight_post->image }}" class="img-responsive"
                                            alt="">
                                    </a>
                                </div>
                                <div class="might-top">
                                    <h4><a href="{{ route('client.detail_post', $hightlight_post->id) }}">
                                            {{ $hightlight_post->title }}
                                        </a></h4>
                                    <p style="white-space: nowrap; width: 200px; overflow:hidden">
                                        {{ $hightlight_post->description }}
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    </div>

                    <div class="abt-2">
                        <h3>Bài viết mới nhất</h3>
                        @foreach ($post_sort as $post)
                            <div class="might-grid pl-20">
                                <div class="grid-might">
                                    <a href="{{ route('client.detail_post', $post->id) }}">
                                        <img src="../../../{{ $post->image }}" class="img-responsive" alt="">
                                    </a>
                                </div>
                                <div class="might-top">
                                    <h4><a href="{{ route('client.detail_post', $post->id) }}">
                                            {{ $post->title }}
                                        </a></h4>
                                    <p style="white-space: nowrap; width: 200px; overflow:hidden">
                                        {{ $post->description }}
                                    </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    @if (Auth::check())
        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 ">
            <a href="{{ route('client.user_create_post') }}">
                <button type="submit"
                    class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                    Add Post
                </button>
            </a>
        </div>
    @endif
@endsection
