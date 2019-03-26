<?php

namespace App\Mail;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostUpdatedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $recipient;
    public $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $recipient, User $sender)
    {
        $this->post = $post;
        $this->recipient = $recipient;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('A post was updated')->markdown('email.post-updated');
    }
}
