<?php

namespace Daikon\AsyncJob\Event;

use Daikon\MessageBus\MessageInterface;

final class JobFailed implements MessageInterface
{
    private $failedMessage;

    public static function fromNative($data): MessageInterface
    {
        return new self($data['failed_message']);
    }

    public function toNative(): array
    {
        return $this->failedMessage->toNative();
    }

    private function __construct(MessageInterface $failedMessage)
    {
        $this->failedMessage = $failedMessage;
    }
}
