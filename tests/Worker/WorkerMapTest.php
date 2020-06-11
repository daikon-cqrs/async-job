<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Tests\AsyncJob\Worker;

use Daikon\AsyncJob\Worker\WorkerInterface;
use Daikon\AsyncJob\Worker\WorkerMap;
use PHPUnit\Framework\TestCase;

final class WorkerMapTest extends TestCase
{
    public function testConstructWithSelf(): void
    {
        $workerMock = $this->createMock(WorkerInterface::class);
        $workerMap = new WorkerMap(['mock' => $workerMock]);
        $newMap = new WorkerMap($workerMap);
        $this->assertCount(1, $newMap);
        $this->assertFalse($workerMap === $newMap);
    }

    public function testPush(): void
    {
        $emptyMap = new WorkerMap;
        /** @var WorkerInterface $workerMock */
        $workerMock = $this->createMock(WorkerInterface::class);
        $workerMap = $emptyMap->with('mock', $workerMock);
        $this->assertCount(1, $workerMap);
        $this->assertEquals($workerMock, $workerMap->get('mock'));
        $this->assertTrue($emptyMap->isEmpty());
    }
}
