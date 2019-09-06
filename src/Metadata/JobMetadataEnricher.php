<?php
/**
 * This file is part of the daikon-cqrs/async-job project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\AsyncJob\Metadata;

use Daikon\AsyncJob\Job\JobDefinitionMap;
use Daikon\AsyncJob\JobException;
use Daikon\Metadata\MetadataInterface;
use Daikon\Metadata\MetadataEnricherInterface;

final class JobMetadataEnricher implements MetadataEnricherInterface
{
    /** @var JobDefinitionMap */
    private $jobDefinitionMap;

    /** @var array */
    private $settings;

    public function __construct(JobDefinitionMap $jobDefinitionMap, array $settings)
    {
        $this->jobDefinitionMap = $jobDefinitionMap;
        $this->settings = $settings;
    }

    public function enrich(MetadataInterface $metadata): MetadataInterface
    {
        if (!isset($this->settings['job'])) {
            throw new JobException('Enricher requires a job setting to enrich metadata from.');
        }

        $jobDefinition = $this->jobDefinitionMap->get($this->settings['job']);
        $metadata = $metadata->with('job', $this->settings['job']);
        foreach ($jobDefinition->getSettings() as $setting => $value) {
            $metadata = $metadata->with($setting, $value);
        }

        return $metadata;
    }
}
