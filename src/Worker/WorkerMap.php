<?php

namespace Daikon\AsyncJob\Worker;

use Daikon\DataStructure\TypedMapTrait;

final class WorkerMap implements \IteratorAggregate, \Countable
{
    use TypedMapTrait;

    public function __construct(array $workers = [])
    {
        $this->init($workers, WorkerInterface::class);
    }
}
