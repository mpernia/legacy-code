<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\BoundedContext\Backend\Infrastructure\Resources\RoleResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Role;
use Src\BoundedContext\Shared\Infrastructure\Requests\RoleRequest;

class RoleController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Role::class);

        return RoleResource::collection(Role::all());
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('create', Role::class);

        return new RoleResource(Role::create($request->validated()));
    }

    public function show(Role $role)
    {
        $this->authorize('view', $role);

        return new RoleResource($role);
    }

    public function update(RoleRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $role->update($request->validated());

        return new RoleResource($role);
    }

    public function destroy(Role $role): JsonResponse
    {
        $this->authorize('delete', $role);

        $role->delete();

        return response()->json();
    }
}
