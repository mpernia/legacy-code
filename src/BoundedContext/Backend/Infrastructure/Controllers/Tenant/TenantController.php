<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Backend\Infrastructure\Resources\TenantResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Tenant;
use Src\BoundedContext\Shared\Infrastructure\Requests\TenantRequest;

class TenantController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Tenant::class);

        return tenantResource::collection(Tenant::all());
    }

    public function store(TenantRequest $request)
    {
        $this->authorize('create', Tenant::class);

        return new tenantResource(Tenant::create($request->validated()));
    }

    public function show(Tenant $tenant)
    {
        $this->authorize('view', $tenant);

        return new tenantResource($tenant);
    }

    public function update(TenantRequest $request, Tenant $tenant)
    {
        $this->authorize('update', $tenant);

        $tenant->update($request->validated());

        return new tenantResource($tenant);
    }

    public function destroy(Tenant $tenant)
    {
        $this->authorize('delete', $tenant);

        $tenant->delete();

        return response()->json();
    }
}
