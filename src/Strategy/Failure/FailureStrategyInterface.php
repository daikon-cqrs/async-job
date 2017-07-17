<?php

namespace Daikon\AsyncJob\Strategy\Failure;

use Daikon\MessageBus\EnvelopeInterface;

interface FailureStrategyInterface
{
    public function hasFailed(EnvelopeInterface $envelope);
}
