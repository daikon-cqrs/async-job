<?php

namespace Daikon\AsyncJob\Strategy\Retry;

use Daikon\MessageBus\EnvelopeInterface;

interface RetryStrategyInterface
{
    public function getInterval(EnvelopeInterface $envelope);
}
