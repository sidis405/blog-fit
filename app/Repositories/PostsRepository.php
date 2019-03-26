<?php

namespace App\Repositories;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsRepository
{
    public function index(Request $request)
    {
        $posts = Post::with('user', 'category', 'tags');

        if ($year = $request->year) {
            $posts = $posts->whereYear('created_at', $year);
        }

        if ($month = $request->month) {
            $posts = $posts->whereMonth('created_at', Carbon::parse($month)->format('m'));
        }

        return  $posts->latest()->paginate(15);
    }
}
