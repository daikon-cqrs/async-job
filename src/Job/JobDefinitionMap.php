<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\AsyncJob\Job;

use Daikon\DataStructure\TypedMap;

final class JobDefinitionMap extends TypedMap
{
    public function __construct(iterable $jobs = [])
    {
        $this->init($jobs, [JobDefinitionInterface::class]);
    }
}
