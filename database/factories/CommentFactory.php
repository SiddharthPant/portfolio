<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Traits\HasRealTimestamps;
use DateMalformedStringException;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    use HasRealTimestamps;

    protected $model = Comment::class;

    /**
     * @throws DateMalformedStringException
     */
    public function definition(): array
    {
        $timestamps = $this->generateTimestamps();

        return [
            'body' => $this->faker->text(144),
            'likes_count' => $this->faker->randomNumber(2),
            'created_at' => $timestamps['created_at'],
            'updated_at' => $timestamps['updated_at'],

            'user_id' => User::factory(),
            'post_id' => Post::factory(),
        ];
    }
}
