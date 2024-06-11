<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Mail\SendMail;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function send_mail($id) {
        $users = User::find($id);
        $posts = Post::find($id);
        $comments = Comment::find($id);
        $mailable = new SendMail($users);

        Mail::to("huyhoang12.work@gmail.com")->send($mailable);
        return true;
    }
}
