<?php

namespace App\Dto;

use App\Validator\SupportedVacancySorting;

class VacancyFilter
{
    public ?string $country;

    public ?string $city;

    /** @SupportedVacancySorting */
    public ?string $sortBy;

    public function __construct(?string $country, ?string $city, ?string $sortBy)
    {
        $this->country = $country;
        $this->city    = $city;
        $this->sortBy  = $sortBy;
    }
}
