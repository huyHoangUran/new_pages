@extends('admin.layout.master')
@section('title', 'List Post')
@section('content_title', 'List Post')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $key => $post)
                <tr>
                    <th scope="row">{{$key+=1}}</th>
                    <td>{{$post->title}}</td>
                    <td>
                        <p style="white-space: nowrap; width: 400px; overflow:hidden">
                            {{$post->content}}
                        </p>
                    </td>
                    {{-- <td>{!!$post->content!!}</td> --}}
                    <td>
                        <p style="white-space: nowrap; width: 400px; overflow:hidden">
                            {{$post->description}}
                        </p>
                    </td>
                    <td>{{$post->status == 1 ? "Đã duyệt" : "Chưa duyệt"}}</td>
                    <td>
                        <img width="100" src="../../../{{$post->image}}" alt=""> 
                    </td>
                    <td>
                        <button class="btn btn-primary">
                            <a class="text-white" href="{{route('admin.post.edit', $post->id)}}">Edit</a>
                        </button>
                        <button class="btn btn-danger">
                            <a class="text-white"
                            onclick="return confirm('Really delete this category?')"
                            href="{{route('admin.post.delete', $post->id)}}"> Delete</a>
                        </button>

                        @if ($post->status == 0)
                            <button class="btn btn-success">
                                <a class="text-white" href="{{ route('admin.post.update_status', ['id'=> $post->id, 'status' => 1]) }}" onclick="return confirm('Do you want to make it public ?')">
                                    Show
                                </a>
                            </button>
                        @endif

                        @if ($post->status == 1)
                            <button class="btn btn-info">
                                <a class="text-white" href="{{ route('admin.post.update_status', ['id'=> $post->id, 'status' => 0]) }}" onclick="return confirm('Do you want to make it private ?')">
                                    Hidden
                                </a>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection