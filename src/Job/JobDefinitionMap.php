<?php
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\AsyncJob\Job;

use Daikon\DataStructure\TypedMapTrait;

final class JobDefinitionMap implements \IteratorAggregate, \Countable
{
    use TypedMapTrait;

    public function __construct(array $jobs = [])
    {
        $this->init($jobs, JobDefinitionInterface::class);
    }
}
