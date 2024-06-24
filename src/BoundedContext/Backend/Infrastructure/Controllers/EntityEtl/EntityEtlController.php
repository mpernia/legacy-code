<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\EntityEtl;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Backend\Infrastructure\Resources\EntityEtlResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\EntityEtl;
use Src\BoundedContext\Shared\Infrastructure\Requests\EntityEtlRequest;

class EntityEtlController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', EntityEtl::class);

        return EntityEtlResource::collection(EntityEtl::all());
    }

    public function store(EntityEtlRequest $request)
    {
        $this->authorize('create', EntityEtl::class);

        return new EntityEtlResource(EntityEtl::create($request->validated()));
    }

    public function show(EntityEtl $entityEtl)
    {
        $this->authorize('view', $entityEtl);

        return new EntityEtlResource($entityEtl);
    }

    public function update(EntityEtlRequest $request, EntityEtl $entityEtl)
    {
        $this->authorize('update', $entityEtl);

        $entityEtl->update($request->validated());

        return new EntityEtlResource($entityEtl);
    }

    public function destroy(EntityEtl $entityEtl)
    {
        $this->authorize('delete', $entityEtl);

        $entityEtl->delete();

        return response()->json();
    }
}
