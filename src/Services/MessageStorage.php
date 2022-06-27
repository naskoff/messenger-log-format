<?php

namespace App\Services;

class MessageStorage
{

    /**
     * @var ?string
     */
    private ?string $id = null;

    public function __construct()
    {
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
}