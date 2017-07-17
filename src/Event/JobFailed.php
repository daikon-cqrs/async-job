<?php

namespace Daikon\AsyncJob\Event;

use Daikon\MessageBus\MessageInterface;

final class JobFailed implements MessageInterface
{
    private $failedMessage;

    public static function fromArray(array $data): MessageInterface
    {
        return new self($data['failed_message']);
    }

    public function toArray(): array
    {
        return $this->failedMessage->toArray();
    }

    protected function __construct(MessageInterface $failedMessage)
    {
        $this->failedMessage = $failedMessage;
    }
}
