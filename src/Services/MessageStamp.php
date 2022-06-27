<?php

namespace App\Services;

use Symfony\Component\Messenger\Stamp\StampInterface;

class MessageStamp implements StampInterface
{

    public function __construct(private readonly string $id)
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}