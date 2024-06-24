<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\ProductFamily;

/**
 * @extends Factory<ProductFamily>
 */
class ProductFamilyFactory extends Factory
{
    protected $model = ProductFamily::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
