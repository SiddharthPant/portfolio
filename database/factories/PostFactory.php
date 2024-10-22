<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Support\PostFixtures;
use App\Support\PostStatusEnum;
use App\Traits\HasRealTimestamps;
use DateMalformedStringException;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->word(),
            'body' => $this->faker->word(),
            'html' => $this->faker->word(),
            'status' => PostStatusEnum::DRAFT,
            'published_at' => null,
            'likes_count' => $this->faker->randomNumber(2),
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
            'status' => PostStatusEnum::PUBLISHED,
            'published_at' => $attributes['updated_at'],
        ]);
    }

    public function archived(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => PostStatusEnum::ARCHIVED,
            'published_at' => $attributes['updated_at'],
        ]);
    }
}
