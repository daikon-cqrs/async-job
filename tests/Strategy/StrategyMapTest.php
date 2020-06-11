<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Tests\AsyncJob\Strategy;

use Daikon\AsyncJob\Strategy\JobStrategyInterface;
use Daikon\AsyncJob\Strategy\JobStrategyMap;
use PHPUnit\Framework\TestCase;

final class JobStrategyMapTest extends TestCase
{
    public function testConstructWithSelf(): void
    {
        $strategyMock = $this->createMock(JobStrategyInterface::class);
        $strategyMap = new JobStrategyMap(['mock' => $strategyMock]);
        $newMap = new JobStrategyMap($strategyMap);
        $this->assertCount(1, $newMap);
        $this->assertFalse($strategyMap === $newMap);
    }

    public function testPush(): void
    {
        $emptyMap = new JobStrategyMap;
        /** @var JobStrategyInterface $strategyMock */
        $strategyMock = $this->createMock(JobStrategyInterface::class);
        $strategyMap = $emptyMap->with('mock', $strategyMock);
        $this->assertCount(1, $strategyMap);
        $this->assertEquals($strategyMock, $strategyMap->get('mock'));
        $this->assertTrue($emptyMap->isEmpty());
    }
}
