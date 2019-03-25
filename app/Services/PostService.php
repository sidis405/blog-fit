<?php

namespace Services;

use App\Post;
use Illuminate\Http\Request;

class PostService
{
    public function handleUpdate(Post $post, Request $request)
    {
        $post->update($request->validated());

        $post->addTags($request->tags);

        return $post;
    }
}
