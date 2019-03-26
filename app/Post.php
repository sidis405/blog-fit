<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Mutators
    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = str_slug($title);
    }

    /**
     * Methods
     */

    public function addTags(array $tags)
    {
        $post->tags()->sync($tags);
    }

    public function tagLinks()
    {
        // return $this->tags->map(function ($tag) {
        //     return [$tag->name => route('tags.show', $tag)];
        // })->collapse()->toArray();

        return $this->tags->map(function ($tag) {
            return "<a href='" . route('tags.show', $tag) . "'>{$tag->name}</a>";
        })->implode(', ');
    }
}
