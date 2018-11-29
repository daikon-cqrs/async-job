<?php

namespace Daikon\AsyncJob\Job;

use Daikon\AsyncJob\Strategy\JobStrategyInterface;

final class JobDefinition
{
    /** @var JobStrategyInterface */
    private $jobStrategy;

    /** @var array */
    private $settings;

    public function __construct(JobStrategyInterface $jobStrategy, array $settings = [])
    {
        $this->jobStrategy = $jobStrategy;
        $this->settings = $settings;
    }

    public function getStrategy(): JobStrategyInterface
    {
        return $this->jobStrategy;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }
}
