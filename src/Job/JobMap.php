<?php

namespace Daikon\AsyncJob\Job;

use Daikon\DataStructure\TypedMapTrait;

final class JobMap implements \IteratorAggregate, \Countable
{
    use TypedMapTrait;

    public function __construct(array $jobs = [])
    {
        $this->init($jobs, JobInterface::class);
    }
}
