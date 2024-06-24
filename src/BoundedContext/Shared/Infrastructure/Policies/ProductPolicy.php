<?php

namespace Src\BoundedContext\Shared\Infrastructure\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\Product;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

class ProductPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, product $product)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, product $product)
    {
    }

    public function delete(User $user, product $product)
    {
    }

    public function restore(User $user, product $product)
    {
    }

    public function forceDelete(User $user, product $product)
    {
    }
}
