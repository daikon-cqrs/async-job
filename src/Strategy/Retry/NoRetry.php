<?php

namespace Daikon\AsyncJob\Strategy\Retry;

use Daikon\AsyncJob\Strategy\Failure\FailureStrategyInterface;

class NoRetry implements RetryStrategyInterface, FailureStrategyInterface
{
    public function getInterval()
    {
        return false;
    }

    public function hasFailed()
    {
        $metadata = $this->job->getMetadata();
        return isset($metadata['retries']);
    }
}
