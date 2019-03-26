<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $posts = Post::with('user', 'category', 'tags')
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(15);

        return view('categories.show', compact('posts', 'category'));
    }
}
