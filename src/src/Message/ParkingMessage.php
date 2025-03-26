<?php

namespace App\Message;

use Symfony\Component\Messenger\Attribute\AsMessage;

#[AsMessage('async')]
class ParkingMessage
{
    public function __construct(
        private array $response,
    )
    {
    }

    public function getResponse(): array
    {
        return $this->response;
    }
}