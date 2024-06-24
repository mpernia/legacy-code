<?php

namespace Src\BoundedContext\Backend\Infrastructure\Persistence\Repositories;

use Src\BoundedContext\Shared\Domain\Contracts\Repositories\ProductRepository;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Product;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Repositories\EloquentRepository;

class ProductEloquentRepository extends EloquentRepository implements ProductRepository
{
    public function setModel(): string
    {
        return Product::class;
    }

    public function findByProductFamily(int $productFamilyId): ?array
    {
        return null;
    }
}
