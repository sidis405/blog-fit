<?php

namespace App\Listeners;

use App\User;
use \App\Events\PostWasUpdated;
use App\Jobs\SendEmailPostWasUpdated;

class PostWasUpdatedListener
{
    public function handle(PostWasUpdated $event)
    {
        $post = $event->post;
        $author = $post->user;
        $admin = User::whereRole('admin')->firstOrFail();

        $currentUser = auth()->user();

        if (! $currentUser->isAdmin() && $currentUser->hasAuthored($post)) {
            $sender = $author;
            $recipient = $admin;
        }

        if ($currentUser->isAdmin() || ! $currentUser->hasAuthored($post)) {
            $sender = $admin;
            $recipient = $author;
        }

        if (! ($currentUser->isAdmin() && $currentUser->hasAuthored($post))) {
            SendEmailPostWasUpdated::dispatch($post, $recipient, $sender);
        }
    }
}
