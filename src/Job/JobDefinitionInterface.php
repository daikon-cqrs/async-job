<?php

namespace Daikon\AsyncJob\Job;

use Daikon\AsyncJob\Strategy\JobStrategyInterface;

interface JobDefinitionInterface
{
    public function getStrategy(): JobStrategyInterface;

    public function getSettings(): array;
}
