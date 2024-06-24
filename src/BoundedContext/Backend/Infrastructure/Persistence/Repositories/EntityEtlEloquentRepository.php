<?php

namespace Src\BoundedContext\Backend\Infrastructure\Persistence\Repositories;

use Src\BoundedContext\Shared\Domain\Contracts\Repositories\EntityEtlRepository;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\EntityEtl;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Repositories\EloquentRepository;

class EntityEtlEloquentRepository extends EloquentRepository implements EntityEtlRepository
{
    public function setModel(): string
    {
        return EntityEtl::class;
    }

    public function findNotLaunchedWithTenant(): array
    {
        return [];
    }

    public function findLastExecution(int $endtityEtlId, int $tenantId): string
    {
        return '';
    }
}
