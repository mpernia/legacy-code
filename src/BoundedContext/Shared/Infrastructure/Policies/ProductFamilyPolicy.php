<?php

namespace Src\BoundedContext\Shared\Infrastructure\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\productFamily;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

class ProductFamilyPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, productFamily $product_family)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, productFamily $product_family)
    {
    }

    public function delete(User $user, productFamily $product_family)
    {
    }

    public function restore(User $user, productFamily $product_family)
    {
    }

    public function forceDelete(User $user, productFamily $product_family)
    {
    }
}
