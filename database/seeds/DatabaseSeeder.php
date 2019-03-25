<?php

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = factory(Category::class, 10)->create();

        $tags = factory(Tag::class, 30)->create();

        $users = factory(User::class, 10)->create();

        foreach ($users as $user) {
            $posts = factory(Post::class, 15)->create([
                'user_id' => $user->id,
                'category_id' => $categories->random()->id,
            ]);

            foreach ($posts as $post) {
                $post->tags()->sync($tags->random(3));
            }
        }
    }
}
