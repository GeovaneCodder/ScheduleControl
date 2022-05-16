<?php

declare(strict_types=1);

namespace App\Facades;

use App\Models\User;
use App\Models\UserPermission;

class GenerateUserToken
{
    public function __construct(private User $user)
    {
    }

    /**
     * Return and parse all permission from user
     * 
     * @return array
     */
    private function getPermissions(): array
    {
        return $this->user?->userPermissions->map(fn($collect) => $collect->permission)
            ->toArray();
    }

    /**
     * Generate a new Sanctum Bearer Token
     * 
     * @return string
     */
    public function run(): string
    {
        $permissions = $this->getPermissions();
        $token = $this->user->createToken(
            request()->header('user-agent'),
            $permissions
        )->plainTextToken;

        return $token;
    }
}