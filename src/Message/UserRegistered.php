<?php

namespace App\Message;

final class UserRegistered
{

    public function __construct(
        private readonly ?string $username = 'username'
    ) {
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }
}
