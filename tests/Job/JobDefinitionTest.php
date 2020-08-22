<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Tests\AsyncJob\Job;

use Daikon\AsyncJob\Job\JobDefinition;
use Daikon\AsyncJob\Strategy\JobStrategyInterface;
use PHPUnit\Framework\TestCase;

final class JobDefinitionTest extends TestCase
{
    public function testGetStrategy(): void
    {
        $mockStrategy = $this->createMock(JobStrategyInterface::class);
        $jobDefinition = new JobDefinition($mockStrategy);
        $this->assertSame($mockStrategy, $jobDefinition->getStrategy());
    }

    public function testGetSettings(): void
    {
        $mockStrategy = $this->createMock(JobStrategyInterface::class);
        $settings = ['test' => 'value'];
        $jobDefinition = new JobDefinition($mockStrategy, $settings);
        $this->assertSame($settings, $jobDefinition->getSettings());
    }
}
