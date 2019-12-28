<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\AsyncJob\Strategy;

use Countable;
use Daikon\DataStructure\TypedMapTrait;
use IteratorAggregate;

final class JobStrategyMap implements IteratorAggregate, Countable
{
    use TypedMapTrait;

    public function __construct(iterable $strategies = [])
    {
        $this->init($strategies, JobStrategyInterface::class);
    }
}
