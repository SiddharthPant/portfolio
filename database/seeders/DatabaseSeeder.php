<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $readers = User::factory(100)->create();
        $tags = Tag::factory(10)->create();
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);

        Post::factory(5)
            ->withFixture()
            ->for($admin)
            ->create()
            ->each(function (Post $post) use ($tags, $readers) {
                $post->tags()->attach($tags->random(rand(1, 5)));
                Comment::factory()->count(rand(1, 15))->recycle($readers)->recycle($post)->create();
            });

        Post::factory(50)
            ->published()
            ->withFixture()
            ->for($admin)
            ->create()
            ->each(function (Post $post) use ($tags, $readers) {
                $post->tags()->attach($tags->random(rand(1, 5)));
                Comment::factory()->count(rand(1, 15))->recycle($readers)->recycle($post)->create();
            });
    }
}
