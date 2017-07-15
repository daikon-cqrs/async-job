<?php

namespace Daikon\AsyncJob\Strategy;

use Daikon\AsyncJob\Strategy\Retry\RetryStrategyInterface;
use Daikon\AsyncJob\Strategy\Failure\FailureStrategyInterface;

final class JobStrategy implements JobStrategyInterface
{
    private $retryStrategy;

    private $failureStrategy;

    public function __construct(RetryStrategyInterface $retryStrategy, FailureStrategyInterface $failureStrategy)
    {
        $this->retryStrategy = $retryStrategy;
        $this->failureStrategy = $failureStrategy;
    }

    public function getRetryInterval(): int
    {
        return $this->retryStrategy->getInterval();
    }

    public function hasFailed(): bool
    {
        return $this->failureStrategy->hasFailed();
    }

    public function canRetry(): bool
    {
        return !$this->hasFailed() && $this->getRetryInterval();
    }
}
