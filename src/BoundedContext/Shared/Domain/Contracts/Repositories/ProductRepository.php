<?php

namespace Src\BoundedContext\Shared\Domain\Contracts\Repositories;

interface ProductRepository
{
    public function findByProductFamily(int $productFamilyId): ?array;
}
