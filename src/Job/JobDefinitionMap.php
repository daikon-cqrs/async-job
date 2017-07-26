<?php

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
