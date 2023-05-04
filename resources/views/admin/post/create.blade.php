@extends('admin.layout.master')
@section('title', 'Create a news post')
@section('content_title', 'Create a news post')
@section('content')
    <form method="POST" action="{{route('admin.post.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        
        <label class="form-label">Category</label>
        <div class="form-floating">
            <select class="form-select" name="category_id" id="floatingSelect" aria-label="Floating label select example">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            @error('category_id')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{old('title')}}">
       
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
                <textarea name="content" id="content" value="{{old('content')}}"></textarea>
                <script type="text/javascript">CKEDITOR.replace('content');</script>
            
            @error('content')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="{{old('description')}}">
       
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            {{-- <label class="form-label">Status</label> --}}
                    <input type="hidden" name="status" value="0">
            @error('status')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            {{-- <label class="form-label">Status</label> --}}
                    <input type="hidden" name="highlight_post" value="0">
            @error('highlight_post')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
       
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
@endsection
