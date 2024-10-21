<?php

namespace Database\Factories;

use App\Models\User;
use App\Support\UserRoleEnum;
use App\Traits\HasRealTimestamps;
use DateMalformedStringException;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    use HasRealTimestamps;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     * @throws DateMalformedStringException
     */
    public function definition(): array
    {
        $timestamps = $this->generateTimestamps('-4 years', '-3 years');

        return [
            'ulid' => Str::ulid()->toBase58(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => fake()->dateTimeBetween($startDate = '-3 years', $endDate = 'now', $timezone = null),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => $timestamps['created_at'],
            'updated_at' => $timestamps['updated_at'],
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => UserRoleEnum::ADMIN,
        ]);
    }
}
