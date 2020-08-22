<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\AsyncJob\Strategy;

use Daikon\AsyncJob\Strategy\JobStrategyInterface;
use Daikon\MessageBus\EnvelopeInterface;
use Daikon\Metadata\MetadataInterface;

class NoRetry implements JobStrategyInterface
{
    public function canRetry(EnvelopeInterface $envelope): bool
    {
        return false;
    }

    public function enrich(MetadataInterface $metadata): MetadataInterface
    {
        return $metadata;
    }
}
