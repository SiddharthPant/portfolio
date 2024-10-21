<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'php', 'python', 'javascript', 'docker',
                'kubernetes', 'aws', 'azure', 'terraform',
                'ansible', 'helm', 'argocd', 'prometheus',
                'grafana',
            ]),
        ];
    }
}
