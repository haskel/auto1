<?php

namespace App\Cache;

use App\Constant\VacancyFileField;
use App\Service\DataSource\Constant\FieldType;
use App\Service\DataSource\SourceInterface;
use Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerInterface;

/**
 * Load data from vacancies.csv when cache:warmup
 */
class VacanciesSourceWarmer implements CacheWarmerInterface
{
    private SourceInterface $source;

    public function __construct(SourceInterface $source)
    {
        $this->source = $source;
    }

    public function warmUp($cacheDirectory): array
    {
        $this->source->load(
            VacancyFileField::ID,
            [
                VacancyFileField::REQUIRED_SKILLS => FieldType::ARRAY
            ],
            false
        );

        return [];
    }

    public function isOptional(): bool
    {
        return true;
    }
}
