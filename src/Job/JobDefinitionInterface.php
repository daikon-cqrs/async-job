<?php
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\AsyncJob\Job;

use Daikon\AsyncJob\Strategy\JobStrategyInterface;

interface JobDefinitionInterface
{
    public function getStrategy(): JobStrategyInterface;

    public function getSettings(): array;
}
