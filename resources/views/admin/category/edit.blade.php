@extends('admin.layout.master')
@section('title', 'Edit Category')
@section('content_title', 'Edit Category')
@section('content')
    @if(count($errors))
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}    
        </div>                
    @endif
    <form method="POST" action="{{route('admin.category.update', $category->id)}}" class="container">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
       
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-outline-primary">Submit</button>
  </form>
@endsection