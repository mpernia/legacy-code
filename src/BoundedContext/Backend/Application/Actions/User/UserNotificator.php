<?php

namespace Src\BoundedContext\Backend\Application\Actions\User;

use Illuminate\Notifications\Notification;
use Src\BoundedContext\Shared\Domain\Contracts\Repositories\UserRepository;

class UserNotificator
{
    public function __invoke(
        array $users,
        Notification $notification
    ): array
    {
        foreach ($users as $user) {
            try {
                $user->notify($notification);
                $responses[] = [
                    'user_id' => $user->id,
                    'status' => 'sent'
                ];
            } catch (\Exception $e) {
                $responses[] = [
                    'user_id' => $user->id,
                    'status' => 'failed',
                    'error' => $e->getMessage()
                ];
            }
        }

        return $responses;
    }
}
