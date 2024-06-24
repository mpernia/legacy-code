<?php

namespace Src\BoundedContext\Shared\Domain\Contracts\Repositories;

use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

interface UserRepository
{
    public function findAdmin(): User;
}
