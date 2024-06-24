<?php

namespace Src\BoundedContext\Backend\Application\Actions\EntityEtl;

use Src\BoundedContext\Shared\Domain\Contracts\Repositories\EntityEtlRepository;
use Src\BoundedContext\Shared\Infrastructure\Jobs\DispatchEtlForTenantJob;

class EntityEtlForTenantDispatcher
{
    public function __construct(
        private readonly EntityEtlRepository $repository
    )
    {

    }

    public function __invoke(): void
    {
        $entityEtls = $this->repository->findNotLaunchedWithTenant();

        if ($entityEtls) {
            foreach ($entityEtls as $entityEtl) {
                $lastDate = $this->repository
                    ->findLastExecution(
                        endtityEtlId: $entityEtl->id,
                        tenantId: $entityEtl->tenant_id
                    );
                DispatchEtlForTenantJob::dispatch(date: $lastDate)
                    ->onQueue(queue: 'notification');
            }
        }
    }
}
