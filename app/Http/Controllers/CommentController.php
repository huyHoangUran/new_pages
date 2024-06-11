<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Mail\SendMail;
use App\Models\Comment;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comment.list', compact('comments'));
    }

    public function store(Request $request)
    {
        
        $posts = Post::find($request->post_id);
        $users = User::find($request->user_id);
        if (!$users) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $comments = $request->validate(
            [
            'user_id' => 'required',
            'post_id' => 'required',
            'content' => 'required',
            'parent_id' => 'required',
            'status' => 'required',
            ]
        );
        Mail::to($posts->users->email)->send(new SendMail($users->name, $request->content, $posts->title));
        Comment::create($comments);

        return back();
    }

    public function edit($id)
    {
        $comments = Comment::find($id);
        return View('admin.comment.edit', compact('comments'));
    }

    public function update(Request $request, $id)
    {
        $formFileds = $request->validate(
            [
            'user_id' => 'required',
            'post_id' => 'required',
            'content' => 'required',
            'parent_id' => 'required',
            'status' => 'required',
            ]
        );

        Comment::where('id', $id)->update($formFileds);

        return back();
    }

    public function update_status(Request $request)
    {
        $comments = Comment::find($request->id);
        if($comments) {
            $comments->status = $request->status;
        }

        $comments->save();

        return redirect('admin/comment/list');
    }

    public function delete($id)
    {
        Comment::where('id', $id)->delete();
        return back();
    } 
}
