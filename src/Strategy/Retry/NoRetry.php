<?php

namespace Daikon\AsyncJob\Strategy\Retry;

use Daikon\AsyncJob\Strategy\Failure\FailureStrategyInterface;
use Daikon\MessageBus\EnvelopeInterface;

class NoRetry implements RetryStrategyInterface, FailureStrategyInterface
{
    public function getInterval(EnvelopeInterface $envelope): ?int
    {
        return null;
    }

    public function hasFailed(EnvelopeInterface $envelope): bool
    {
        $metadata = $envelope->getMetadata();
        return $metadata->has('_retries');
    }
}
