<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\EntityEtl;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Tenant;

class EntityEtlFactory extends Factory
{
    protected $model = EntityEtl::class;

    public function definition()
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'promt' => $this->faker->word(),

            'tenant_id' => Tenant::factory(),
        ];
    }
}
