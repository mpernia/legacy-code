<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\EntityEtl;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BoundedContext\Backend\Application\Actions\EntityEtl\EntityEtlForTenantDispatcher;
use Symfony\Component\HttpFoundation\Response;

class EntityEtlForTenantDispatcherController extends Controller
{
    public function __invoke(EntityEtlForTenantDispatcher $dispatcher): JsonResponse
    {
        $dispatcher->__invoke();
        return response()->json(
            data: [],
            status: Response::HTTP_NO_CONTENT
        );
    }
}
