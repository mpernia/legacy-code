<?php

namespace Src\BoundedContext\Shared\Infrastructure\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Role;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Role $role)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Role $role)
    {
    }

    public function delete(User $user, Role $role)
    {
    }

    public function restore(User $user, Role $role)
    {
    }

    public function forceDelete(User $user, Role $role)
    {
    }
}
