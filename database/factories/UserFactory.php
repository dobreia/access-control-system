<?php
namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        static $emailCounter = 1; 

        return [
            'name' => $this->faker->name(),
            'email' => 'user' . $emailCounter++ . '@email.com',
            'email_verified_at' => now(),
            'password' => 'password',
            'remember_token' => Str::random(10),
            'phone_number' => $this->faker->phoneNumber,
            'card_number' => strtoupper($this->faker->regexify('[A-Z0-9]{16}')),
            'position_id' => Position::factory(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}