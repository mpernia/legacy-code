<?php

namespace Src\BoundedContext\Backend\Infrastructure\Controllers\User;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Backend\Infrastructure\Resources\UserResource;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;
use Src\BoundedContext\Shared\Infrastructure\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);

        return UserResource::collection(User::all());
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', User::class);

        return new UserResource(User::create($request->validated()));
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);

        return new UserResource($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $user->update($request->validated());

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return response()->json();
    }
}
