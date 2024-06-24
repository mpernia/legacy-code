<?php

namespace Src\BoundedContext\Backend\Application\Actions\Product;

use Src\BoundedContext\Shared\Domain\Contracts\Repositories\ProductRepository;
use Src\BoundedContext\Shared\Infrastructure\Requests\GetProductByProductFamilyRequest;

class ProductByProductFamilyFinder
{
    public function __construct(
        private readonly ProductRepository $repository
    )
    {
    }

    /**
     * @return null|array Product
     */
    public function __invoke(int $productFamilyId): ?array
    {
        return $this->repository
            ->findByProductFamily($productFamilyId);
    }
}
