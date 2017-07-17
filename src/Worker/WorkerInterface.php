<?php

namespace Daikon\AsyncJob\Worker;

interface WorkerInterface
{
    public function run(array $parameters = []): void;
}
