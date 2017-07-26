<?php

namespace Daikon\AsyncJob\Metadata;

use Daikon\AsyncJob\Job\JobDefinitionMap;
use Daikon\AsyncJob\JobException;
use Daikon\MessageBus\Metadata\Metadata;
use Daikon\MessageBus\Metadata\MetadataEnricherInterface;

final class JobMetadataEnricher implements MetadataEnricherInterface
{
    private $jobDefinitionMap;

    private $settings;

    public function __construct(JobDefinitionMap $jobDefinitionMap, array $settings)
    {
        $this->jobDefinitionMap = $jobDefinitionMap;
        $this->settings = $settings;
    }

    public function enrich(Metadata $metadata): Metadata
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
