<?php

namespace App\Logger;

use App\Services\MessageStorage;

class MonologProcessor
{

    public function __construct(private readonly MessageStorage $storage)
    {
    }

    public function __invoke(array $record)
    {
        $record['extra']['request_id'] = $this->storage->getId() ?? '';

        return $record;
    }
}