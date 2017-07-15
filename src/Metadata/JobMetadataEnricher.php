<?php

namespace Daikon\AsyncJob\Metadata;

use Daikon\AsyncJob\Job\JobMap;
use Daikon\AsyncJob\JobException;
use Daikon\MessageBus\Metadata\Metadata;
use Daikon\MessageBus\Metadata\MetadataEnricherInterface;

final class JobMetadataEnricher implements MetadataEnricherInterface
{
    private $jobMap;

    private $settings;

    public function __construct(JobMap $jobMap, array $settings)
    {
        $this->jobMap = $jobMap;
        $this->settings = $settings;
    }

    public function enrich(Metadata $metadata): Metadata
    {
        if (!isset($this->settings['job'])) {
            throw new JobException('Enricher requires a job setting to enrich metadata from.');
        }

        $job = $this->jobMap->get($this->settings['job']);
        foreach ($job->getSettings() as $setting => $value) {
            $metadata = $metadata->with($setting, $value);
        }

        return $metadata;
    }
}
