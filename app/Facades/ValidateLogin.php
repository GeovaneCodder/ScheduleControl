<?php

declare(strict_types=1);

namespace App\Facades;

use Exception;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class ValidateLogin
{
    public function __construct(private User $user, private string $password)
    {
    }

    /**
     * Check email and password from user
     * 
     * @throw \Exception
     * @return void
     */
    public function check(): void
    {
        if (! Hash::check($this->password, $this->user->password)) {
            throw new Exception(__('auth.failed'), Response::HTTP_UNAUTHORIZED);
        }
    }
}