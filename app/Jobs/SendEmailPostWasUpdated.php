<?php

namespace App\Jobs;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use App\Mail\PostUpdatedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailPostWasUpdated implements ShouldQueue
{
    protected $post;
    protected $recipient;
    protected $sender;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->recipient)
            ->send(new PostUpdatedEmail($this->post, $this->recipient, $this->sender));
    }
}
