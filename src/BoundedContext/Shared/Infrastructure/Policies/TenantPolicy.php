<?php

namespace Src\BoundedContext\Shared\Infrastructure\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Tenant;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

class TenantPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, tenant $tenant)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, tenant $tenant)
    {
    }

    public function delete(User $user, tenant $tenant)
    {
    }

    public function restore(User $user, tenant $tenant)
    {
    }

    public function forceDelete(User $user, tenant $tenant)
    {
    }
}
