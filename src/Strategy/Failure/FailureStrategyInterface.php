<?php

namespace Daikon\AsyncJob\Strategy\Failure;

interface FailureStrategyInterface
{
    public function hasFailed();
}
