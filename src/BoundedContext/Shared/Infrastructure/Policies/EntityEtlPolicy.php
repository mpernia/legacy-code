<?php

namespace Src\BoundedContext\Shared\Infrastructure\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\EntityEtl;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

class EntityEtlPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, EntityEtl $entityEtl)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, EntityEtl $entityEtl)
    {
    }

    public function delete(User $user, EntityEtl $entityEtl)
    {
    }

    public function restore(User $user, EntityEtl $entityEtl)
    {
    }

    public function forceDelete(User $user, EntityEtl $entityEtl)
    {
    }
}
