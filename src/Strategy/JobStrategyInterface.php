<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\AsyncJob\Strategy;

use Daikon\MessageBus\EnvelopeInterface;
use Daikon\Metadata\MetadataEnricherInterface;

interface JobStrategyInterface extends MetadataEnricherInterface
{
    public function canRetry(EnvelopeInterface $envelope): bool;
}
