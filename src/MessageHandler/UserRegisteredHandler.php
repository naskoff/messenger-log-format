<?php

namespace App\MessageHandler;

use App\Message\UserRegistered;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class UserRegisteredHandler implements MessageHandlerInterface
{

    public function __construct(private readonly LoggerInterface $logger)
    {
    }

    public function __invoke(UserRegistered $message)
    {
        $this->logger->info('Message arrived', ['context' => $message]);

        return ['opk'];
    }
}
