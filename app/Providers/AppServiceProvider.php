<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Category;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Post::observe(PostObserver::class);

        View::composer('posts._form', function ($view) {
            $categories = Category::all();
            $tags = Tag::all();

            return $view->with(compact('categories', 'tags'));
        });

        View::composer('layouts.sidebar', function ($view) {

            // select year(created_at) as year, month(created_at) as month, count(id) published from posts group by 1, 2 order by min(created_at) DESC

            $archive = Post::selectRaw('year(created_at) as year, monthName(created_at) as month, count(id) published')
            ->groupBy('year', 'month')->orderByRaw("min(created_at) DESC")->get();

            return $view->with(compact('archive'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
