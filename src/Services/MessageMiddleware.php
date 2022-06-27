<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\MiddlewareInterface;
use Symfony\Component\Messenger\Middleware\StackInterface;

class MessageMiddleware implements MiddlewareInterface
{

    public function __construct(
        private readonly MessageStorage $storage
    ) {
    }

    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {
        if (null === $envelope->last(MessageStamp::class)) {
            $envelope = $envelope->with(new MessageStamp($this->storage->getId()));
        }

        return $stack->next()->handle($envelope, $stack);
    }
}