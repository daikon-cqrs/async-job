<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\AsyncJob\Metadata;

use Daikon\AsyncJob\Job\JobDefinitionInterface;
use Daikon\AsyncJob\Job\JobDefinitionMap;
use Daikon\Interop\Assertion;
use Daikon\Metadata\MetadataInterface;
use Daikon\Metadata\MetadataEnricherInterface;

final class JobMetadataEnricher implements MetadataEnricherInterface
{
    private JobDefinitionMap $jobDefinitionMap;

    private array $settings;

    public function __construct(JobDefinitionMap $jobDefinitionMap, array $settings = [])
    {
        $this->jobDefinitionMap = $jobDefinitionMap;
        $this->settings = $settings;
    }

    public function enrich(MetadataInterface $metadata): MetadataInterface
    {
        Assertion::keyIsset($this->settings, 'job', 'Enricher requires a job definition to enrich metadata with.');

        /** @var JobDefinitionInterface $jobDefinition */
        $jobDefinition = $this->jobDefinitionMap->get($this->settings['job']);
        $metadata = $metadata->with('job', $this->settings['job']);
        foreach ($jobDefinition->getSettings() as $setting => $value) {
            $metadata = $metadata->with($setting, $value);
        }

        return $metadata;
    }
}
