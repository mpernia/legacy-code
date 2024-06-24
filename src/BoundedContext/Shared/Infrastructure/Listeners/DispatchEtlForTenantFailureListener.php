<?php

namespace Src\BoundedContext\Shared\Infrastructure\Listeners;

use Illuminate\Support\Arr;
use Src\BoundedContext\Backend\Application\Actions\User\UserNotificator;
use Src\BoundedContext\Backend\Application\Services\UserFinder;
use Src\BoundedContext\Backend\Infrastructure\Notifications\QueueFailureNotification;
use Src\BoundedContext\Shared\Infrastructure\Events\DispatchEtlForTenantFailureEvent;

class DispatchEtlForTenantFailureListener
{
    public function __construct(
        private readonly UserFinder $userFinder,
        private readonly UserNotificator $notificator
    )
    {
    }

    public function handle(DispatchEtlForTenantFailureEvent $event): void
    {
        $this->notificator->__invoke(
            users: Arr::wrap($this->userFinder->findAdmin()),
            notification:  new QueueFailureNotification()
        );
    }
}
