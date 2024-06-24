<?php

namespace Src\BoundedContext\Shared\Domain\Enums;

enum RoleType: int
{
    case ADMIN = 1;
    case MERCHANT = 2;
    case CUSTOMER = 3;
    case TECHNICAL_SUPPORT = 4;

    public function type(): string
    {
        return match($this)
        {
            self::ADMIN => 'Admin',
            self::MERCHANT => 'Merchant',
            self::CUSTOMER => 'Customer',
            self::TECHNICAL_SUPPORT => 'Technical Support',
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
     * @param RoleType $userType
     * @return array<string, int|string>
     */
    public static function at(RoleType $userType): array
    {
        return [
            'id' => $userType->value,
            'name' => $userType->type()
        ];
    }
}
