<?php

namespace Daikon\AsyncJob\Strategy;

use Daikon\MessageBus\EnvelopeInterface;

interface JobStrategyInterface
{
    public function getRetryInterval(EnvelopeInterface $envelope): ?int;

    public function hasFailed(EnvelopeInterface $envelope): bool;

    public function canRetry(EnvelopeInterface $envelope): bool;
}
