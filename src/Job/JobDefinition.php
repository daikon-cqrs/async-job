<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\AsyncJob\Job;

use Daikon\AsyncJob\Strategy\JobStrategyInterface;

final class JobDefinition implements JobDefinitionInterface
{
    private JobStrategyInterface $jobStrategy;

    private array $settings;

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
