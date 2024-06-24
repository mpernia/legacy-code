<?php

namespace Src\BoundedContext\Backend\Application\DataTransferObjects;

class UserListEmailDto
{
    public function __construct(
        private readonly array $userIds,
        private readonly string $message,
        private readonly bool $asyncMode
    )
    {
    }

    public function getUserIds(): array
    {
        return $this->userIds;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function isAsyncMode(): bool
    {
        return $this->asyncMode;
    }
}
