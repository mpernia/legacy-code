<?php

namespace Src\BoundedContext\Backend\Application\Services;

use Src\BoundedContext\Shared\Domain\Contracts\Repositories\UserRepository;
use Src\BoundedContext\Shared\Infrastructure\Persistence\Models\User;

class UserFinder
{
    public function __construct(
        private readonly UserRepository $repository
    )
    {
    }

    public function find(int $userId): ?User
    {

    }

    /** @return null|array User */
    public function byIds(array $userIds): ?array
    {
        return null;
    }

    /** @return null|array User */
    public function all(): ?array
    {
        return null;
    }

    public function findAdmin(): User
    {
        return $this->repository->findAdmin();
    }
}
