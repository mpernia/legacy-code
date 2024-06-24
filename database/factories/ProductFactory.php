<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Product;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\ProductFamily;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Tenant;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(),
            'is_active' => $this->faker->boolean(),

            'tenant_id' => Tenant::factory(),
            'product_family_id' => ProductFamily::factory(),
            'user_id' => User::factory(),
        ];
    }
}
