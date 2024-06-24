<?php

namespace Src\BoundedContext\Shared\Domain\Enums;

enum UserType: int
{
    case ADMIN = 1;
    case ADVERTISER = 2;
    case AFFILIATE = 3;
    case CUSTOMER = 4;
    case ANONYMOUS = 5;

    public function type(): string
    {
        return match($this)
        {
            self::ADMIN => 'Admin',
            self::ADVERTISER => 'Advertiser',
            self::AFFILIATE => 'Affiliate',
            self::CUSTOMER => 'Customer',
            self::ANONYMOUS => 'Anonymous'
        };
    }

    /**
     * @return array<int, array<string, int|string>>
     */
    public static function all(): array
    {
        return array_map(
            fn($case) => [
                'id' => $case->value,
                'name' => $case->type()
            ],
            self::cases()
        );
    }

    /**
     * @param UserType $userType
     * @return array<string, int|string>
     */
    public static function at(UserType $userType): array
    {
        return [
            'id' => $userType->value,
            'name' => $userType->type()
        ];
    }
}
