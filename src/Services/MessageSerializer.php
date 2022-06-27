<?php

namespace App\Services;

use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\PhpSerializer;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

class MessageSerializer extends PhpSerializer implements SerializerInterface
{

    public function __construct(
        private readonly LoggerInterface $logger,
        private readonly MessageStorage $storage,
    ) {
    }

    public function decode(array $encodedEnvelope): Envelope
    {
        $this->logger->debug('decode message', ['debug' => $encodedEnvelope]);

        return parent::decode($encodedEnvelope);
    }

    public function encode(Envelope $envelope): array
    {
        $response = parent::encode($envelope);

        $this->logger->debug('encode message', ['debug' => $response]);

        if (!isset($response['headers'])) {
            $response['headers'] = [];
        }

        $response['headers']['request-id'] = $this->storage->getId();
        
        return $response;
    }
}