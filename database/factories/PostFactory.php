<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Support\PostFixtures;
use App\Traits\HasRealTimestamps;
use DateMalformedStringException;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    use HasRealTimestamps;

    protected $model = Post::class;

    /**
     * @throws DateMalformedStringException
     */
    public function definition(): array
    {
        $timestamps = $this->generateTimestamps();

        return [
            'title' => $this->faker->word(), //
            'body' => $this->faker->word(),
            'html' => $this->faker->word(),
            'published_at' => Carbon::now(),
            'likes_count' => $this->faker->randomNumber(),
            'dislikes_count' => $this->faker->randomNumber(),
            'created_at' => $timestamps['created_at'],
            'updated_at' => $timestamps['updated_at'],

            'user_id' => User::factory(),
        ];
    }

    public function withFixture(): static
    {
        return $this->sequence(...PostFixtures::getFixtures());
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'published_at' => $attributes['updated_at'],
        ]);
    }
}
