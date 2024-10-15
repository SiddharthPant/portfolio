<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Traits\HasRealTimestamps;
use DateMalformedStringException;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    use HasRealTimestamps;

    /**
     * @throws DateMalformedStringException
     */
    public function definition(): array
    {
        $timestamps = $this->generateTimestamps();

        return [
            'name' => $this->faker->unique()->randomElement([
                'php', 'python', 'javascript', 'docker',
                'kubernetes', 'aws', 'azure', 'terraform',
                'ansible', 'helm', 'argocd', 'prometheus',
                'grafana',
            ]),
            'created_at' => $timestamps['created_at'],
            'updated_at' => $timestamps['updated_at'],
        ];
    }
}
