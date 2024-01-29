<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
  protected $model = User::class;
  /**
   * The current password being used by the factory.
   */
  protected static ?string $password;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $roles = ['admin', 'customer'];
    $randomRole = $this->faker->randomElement($roles);

    return [
      'name' => $this->faker->name(),
      'surname' => $this->faker->name(),
      'email' => $this->faker->unique()->safeEmail(),
      'email_verified_at' => now(),
      'password' => bcrypt("1234"),
      'remember_token' => Str::random(10),
      'rol' => $randomRole,
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   */
  /* public function unverified(): static
  {
    return $this->state(fn (array $attributes) => [
      'email_verified_at' => null,
    ]);
  } */
}
