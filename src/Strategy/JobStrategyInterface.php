<?php

namespace Daikon\AsyncJob\Strategy;

interface JobStrategyInterface
{
    public function getRetryInterval(): int;

    public function hasFailed(): bool;

    public function canRetry(): bool;
}
