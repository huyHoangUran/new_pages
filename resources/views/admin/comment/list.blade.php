@extends('admin.layout.master')
@section('title', 'List Comment')
@section('content_title', 'List Comment')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User name</th>
                <th scope="col">Post title</th>
                <th scope="col">Content</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($comments as $key => $comment)
                <tr>
                    {{-- @dd($comment->posts) --}}
                    <th scope="row">{{$key +=1}}</th>
                    <td>{{$comment->users->name}}</td>
                    <td>{{$comment->posts->title}}</td>
                    <td>{{$comment->content}}</td>
                    <td>{{$comment->status == 1 ? 'Đã duyệt' : 'Chưa duyệt'}}</td>
                    <td>
                        <button class="btn btn-danger">
                            <a class="text-white" 
                            onclick="return confirm('Really delete this category?')"
                            href="{{route('admin.comment.delete', $comment->id)}}"> Delete</a>
                        </button>
                        @if ($comment->status == 0)
                            <button class="btn btn-success">
                                <a href="{{ route('admin.comment.update_status', ['id'=> $comment->id, 'status' => 1]) }}" onclick="return confirm('Do you want to make it public ?')">
                                    Show
                                </a>
                            </button>
                        @endif
                        @if ($comment->status == 1)
                            <button class="btn btn-info">
                                <a href="{{ route('admin.comment.update_status', ['id'=> $comment->id, 'status' => 0]) }}" onclick="return confirm('Do you want to make it private ?')">
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