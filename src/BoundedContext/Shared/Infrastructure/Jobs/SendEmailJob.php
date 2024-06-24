<?php

namespace Src\BoundedContext\Shared\Infrastructure\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Src\BoundedContext\Backend\Application\Actions\User\UserNotificator;
use Src\BoundedContext\Backend\Application\DataTransferObjects\UserListEmailDto;
use Src\BoundedContext\Backend\Application\Services\UserFinder;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private array $userIds,
        private Notification $notification
    )
    {
    }

    public function handle(
        UserFinder $userFinder,
        UserNotificator $notificator
    ): void
    {
        $users = $userFinder->byIds($this->userIds);
        $notificator->__invoke($users, $this->notification);
    }
}
