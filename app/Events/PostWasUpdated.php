<?php

namespace App\Events;

use App\Post;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class PostWasUpdated
{
    public $post;

    use Dispatchable, SerializesModels;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
