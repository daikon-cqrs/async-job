<?php
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\AsyncJob\Strategy;

use Daikon\AsyncJob\Strategy\Retry\RetryStrategyInterface;
use Daikon\AsyncJob\Strategy\Failure\FailureStrategyInterface;
use Daikon\MessageBus\EnvelopeInterface;

final class JobStrategy implements JobStrategyInterface
{
    /** @var RetryStrategyInterface */
    private $retryStrategy;

    /** @var FailureStrategyInterface */
    private $failureStrategy;

    public function __construct(RetryStrategyInterface $retryStrategy, FailureStrategyInterface $failureStrategy)
    {
        $this->retryStrategy = $retryStrategy;
        $this->failureStrategy = $failureStrategy;
    }

    public function getRetryInterval(EnvelopeInterface $envelope): ?int
    {
        return $this->retryStrategy->getInterval($envelope);
    }

    public function hasFailed(EnvelopeInterface $envelope): bool
    {
        return $this->failureStrategy->hasFailed($envelope);
    }

    public function canRetry(EnvelopeInterface $envelope): bool
    {
        return !$this->hasFailed($envelope) && $this->getRetryInterval($envelope);
    }
}
