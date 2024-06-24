<?php

namespace Src\BoundedContext\Backend\Infrastructure\Persistence\Repositories;

use Src\BoundedContext\Shared\Domain\Contracts\Repositories\UserRepository;
use Src\BoundedContext\Shared\Domain\Enums\RoleType;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Repositories\EloquentRepository;

class UserEloquentRepository extends EloquentRepository implements UserRepository
{
    public function setModel(): string
    {
        return User::class;
    }

    public function findAdmin(): User
    {
        return $this->model
            ->where('role_id', RoleType::ADMIN)
            ->first();
    }
}
