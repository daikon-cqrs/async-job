<?php
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\AsyncJob\Strategy\Failure;

use Daikon\MessageBus\EnvelopeInterface;

interface FailureStrategyInterface
{
    public function hasFailed(EnvelopeInterface $envelope): bool;
}
