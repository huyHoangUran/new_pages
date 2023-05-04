<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public $user_name;
    public $comment_content;
    public $post_title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name, $comment_content, $post_title)
    {
        $this->user_name = $user_name;
        $this->comment_content = $comment_content;
        $this->post_title = $post_title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('thanhlongvn2002@gmail.com', 'Example')
                ->view('mail.sendmail');
    }
}
