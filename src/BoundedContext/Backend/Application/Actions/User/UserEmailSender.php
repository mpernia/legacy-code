<?php

namespace Src\BoundedContext\Backend\Application\Actions\User;

use Src\BoundedContext\Backend\Application\DataTransferObjects\UserListEmailDto;
use Src\BoundedContext\Backend\Application\Services\UserFinder;
use Src\BoundedContext\Backend\Infrastructure\Notifications\UserNotification;
use Src\BoundedContext\Shared\Domain\Contracts\Repositories\UserRepository;
use Src\BoundedContext\Shared\Infrastructure\Jobs\SendEmailJob;

class UserEmailSender
{
    public function __construct(
        private readonly UserFinder $userFinder,
        private readonly UserNotificator $notificator,
    )
    {
    }

    /**
     * @param UserListEmailDto $userListEmail
     * @return array
     */
    public function __invoke(UserListEmailDto $userListEmail): array
    {
        $userIds = $userListEmail->getUserIds();
        $notifiedUsers = [];
        if ($userListEmail->isAsyncMode()) {
            SendEmailJob::dispatch($userIds, new UserNotification());
        }
        if (!$userListEmail->isAsyncMode()) {
            $users = $this->userFinder->byIds($userIds);
            $notifiedUsers = $this->notificator->__invoke($users, new UserNotification());
        }

        return [
            'async' => (int)$userListEmail->isAsyncMode(),
            'users' => $notifiedUsers
        ];
    }
}
