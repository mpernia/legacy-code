<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Role;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

/**
 * @extends Factory<Role>
 */
class RoleFactory extends Factory
{
    protected $model = Role::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),

            'user_id' => User::factory(),
        ];
    }
}
