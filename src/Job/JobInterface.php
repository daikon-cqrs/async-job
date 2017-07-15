<?php

namespace Daikon\AsyncJob\Job;

use Daikon\AsyncJob\Strategy\JobStrategyInterface;

interface JobInterface
{
    public function getStrategy(): JobStrategyInterface;

    public function getSettings(): array;
}
