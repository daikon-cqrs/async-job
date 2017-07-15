<?php

namespace Daikon\AsyncJob\Strategy\Retry;

interface RetryStrategyInterface
{
    public function getInterval();
}
