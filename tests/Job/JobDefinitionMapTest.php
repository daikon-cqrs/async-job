<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Tests\AsyncJob\Job;

use Daikon\AsyncJob\Job\JobDefinitionInterface;
use Daikon\AsyncJob\Job\JobDefinitionMap;
use PHPUnit\Framework\TestCase;

final class JobDefinitionMapTest extends TestCase
{
    public function testConstructWithSelf(): void
    {
        $jobMock = $this->createMock(JobDefinitionInterface::class);
        $jobMap = new JobDefinitionMap(['mock' => $jobMock]);
        $newMap = new JobDefinitionMap($jobMap);
        $this->assertCount(1, $newMap);
        $this->assertNotSame($jobMap, $newMap);
        $this->assertEquals($jobMap, $newMap);
    }

    public function testPush(): void
    {
        $emptyMap = new JobDefinitionMap;
        /** @var JobDefinitionInterface $jobMock */
        $jobMock = $this->createMock(JobDefinitionInterface::class);
        $jobMap = $emptyMap->with('mock', $jobMock);
        $this->assertCount(1, $jobMap);
        $this->assertEquals($jobMock, $jobMap->get('mock'));
        $this->assertTrue($emptyMap->isEmpty());
    }
}
