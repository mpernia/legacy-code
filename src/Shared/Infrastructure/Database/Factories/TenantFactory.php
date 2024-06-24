<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Tenant;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

/**
 * @extends Factory<Tenant>
 */
class TenantFactory extends Factory
{
    protected $model = Tenant::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'website' => $this->faker->word(),

            'user_id' => User::factory(),
        ];
    }
}
