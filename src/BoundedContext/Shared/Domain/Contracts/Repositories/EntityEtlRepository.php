<?php

namespace Src\BoundedContext\Shared\Domain\Contracts\Repositories;

interface EntityEtlRepository
{
    public function findNotLaunchedWithTenant(): array;

    public function findLastExecution(int $endtityEtlId, int $tenantId): string;
}
