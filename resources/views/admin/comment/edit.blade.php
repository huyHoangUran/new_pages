@extends('admin.layout.master')
@section('title', 'List Comment')
@section('content_title', 'List Comment')
@section('content')
<form method="POST" action="{{route('admin.comment.update')}}" >
    @csrf
    @method('put')
        <input type="hidden" name="user_id" value="{{$comments->id}}">
        <input type="hidden" name="post_id" value="{{$comments->id}}">
        <input type="hidden" name="parent_id" value="{{$comments->parent_id}}">
        <input type="hidden" name="status" value="1">
</form>
@endsection