<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        // dd($posts);
        return view('admin.post.list', compact('posts'));
    }

    public function create() { 
        $categories = Category::all();
        // dd($categories);
        return view('admin.post.create', [
            'categories' => $categories, 
        ]);
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'image' => 'mimes:jpg,jpeg,png',
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'status' => 'required',
            'highlight_post' => 'required',
        ]);
        // $formFields = [
        //     'image' => $request->image,
        //     'user_id' => Auth::user()->id,
        //     'category_id' => $request->category_id,
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'description' => $request->description,
        //     'status' => $request->status,
        //     'highlight_post' => $request->highlight_post,
        // ];

        // dd($formFields);
        if($request->hasFile('image')) {
            $file = $request->image;
            // dd($file->getClientOriginalName());
            // $fileExtension = $file->getClientOriginalExtension();
            $file->move("uploads/posts/", $file->getClientOriginalName());
        }
        $formFields['image'] = "uploads/posts/".$file->getClientOriginalName();

        Post::create($formFields);
        return redirect()->route('admin.post.list');
    }

    public function user_store(Request $request) {
        // dd($request);
        $formFields = $request->validate([
            'image' => 'mimes:jpg,jpeg,png',
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'status' => 'required',
            'highlight_post' => 'required',
        ]);

        // dd($formFields);
        // dd($request->image);
        if($request->hasFile('image')) {
            $file = $request->image;
            // dd($file->getClientOriginalName());
            // $fileExtension = $file->getClientOriginalExtension();
            $file->move("uploads/posts/", $file->getClientOriginalName());
        }
        $formFields['image'] = "uploads/posts/".$file->getClientOriginalName();

        
        Post::create($formFields);
        return redirect()->route('client.home')->with('message', 'Create a new post successfully, please wait accepet!');
    }
    
    public function edit($id) {
        $categories = Category::all();
        $posts = Post::find($id);
        return view('admin.post.edit', [
            'categories' => $categories,
            'posts' => $posts
        ]);
    }

    public function update(Request $request) {
        $formFields = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'description' => 'required',
            'status' => 'required',
            'highlight_post' => 'required',
            'id' => 'required',
            'image' => 'mimes:ipg,jpeg,png',
        ]);

        // dd($formFields);
        $posts = Post::find($formFields['id']);


        if($request->hasFile('image')) {
            $file = $formFields['image'];
            $filename = $file->getClientOriginalName();
            $path = 'uploads/posts/';
            $file->move($path, $filename);
            $posts->image = $path . $filename;
        }
        
        // dd($request->image);
        $posts->title = $formFields['title'];
        $posts->content = $formFields['content'];
        $posts->description = $formFields['description'];
        $posts->user_id =  $formFields['user_id'];
        $posts->user_id =  $formFields['status'];
        $posts->user_id =  $formFields['highlight_post'];
        $posts->category_id = $formFields['category_id'];
        $posts->created_at = Carbon::now();


        $posts->save();
        return redirect()->route('admin.post.list');
    }

    public function update_status(Request $request) {
        $posts = Post::find($request->id);
        if($posts) {
            $posts->status = $request->status;
        }
        $posts->save();
        return redirect()->route('admin.post.list');
    }

    public function delete($id) {
        Post::where('id', $id)->delete();
        return redirect('admin/post/list')->with('message', 'Delete post successfully');
    }

    public function show_post() {
        $post_hl = Post::first();
        $posts = Post::where('status', 1)->get();
        $hightlight_posts = Post::where('highlight_post', 1)->get();
        $post_sort = Post::orderByRaw('created_at DESC')->limit(3)->get();
        $categories = Category::all();


        return view('client.home', compact('posts', 'post_hl', 'categories', 'hightlight_posts', 'post_sort'));
    }

    public function detail_post($id) {
        $comments = Comment::where('status', 1)->get();
        $posts = Post::find($id); 
        $posts_same = Post::where('status', 1)->get();
        $hightlight_posts = Post::where('highlight_post', 1)->get();

        return view('client.detail_post', compact('posts_same', 'posts', 'comments', 'hightlight_posts'));
    }

    public function user_create_post() {
        $categories = Category::all();
        // dd($categories);
        return view('client.create_post', [
            'categories' => $categories, 
        ]);
    }

    public function post_category($id) {
        // $categories = Category::all();
        $posts = Post::where('category_id', $id)->get();
        $posts_same = Post::all();
        return view('client.post_category', compact('posts', 'posts_same'));
    }

    public function search(Request $request) {
        $key_words = $request->keyword_submit;
        $posts_same = Post::all();

        $search_post = Post::where('title', 'like', '%'.$key_words.'%')->get();

        return view('client.search_post', compact('search_post', 'posts_same'));
    }

}
