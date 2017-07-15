<?php

namespace Daikon\AsyncJob\Strategy;

use Daikon\DataStructure\TypedMapTrait;

final class JobStrategyMap implements \IteratorAggregate, \Countable
{
    use TypedMapTrait;

    public function __construct(array $strategies = [])
    {
        $this->init($strategies, JobStrategyInterface::class);
    }
}
