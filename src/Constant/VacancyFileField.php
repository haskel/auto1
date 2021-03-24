<?php

namespace App\Constant;

class VacancyFileField
{
    public const ID              = "ID";
    public const JOB_TITLE       = "Job title";
    public const SENIORITY_LEVEL = "Seniority level";
    public const COUNTRY         = "Country";
    public const CITY            = "City";
    public const SALARY          = "Salary";
    public const CURRENCY        = "Currency";
    public const REQUIRED_SKILLS = "Required skills";
    public const COMPANY_SIZE    = "Company size";
    public const COMPANY_DOMAIN  = "Company domain";

    public const ALIAS_MAP = [
        VacancyFieldAlias::ID              => self::ID,
        VacancyFieldAlias::JOB_TITLE       => self::JOB_TITLE,
        VacancyFieldAlias::SENIORITY_LEVEL => self::SENIORITY_LEVEL,
        VacancyFieldAlias::COUNTRY         => self::COUNTRY,
        VacancyFieldAlias::CITY            => self::CITY,
        VacancyFieldAlias::SALARY          => self::SALARY,
        VacancyFieldAlias::CURRENCY        => self::CURRENCY,
        VacancyFieldAlias::REQUIRED_SKILLS => self::REQUIRED_SKILLS,
        VacancyFieldAlias::COMPANY_SIZE    => self::COMPANY_SIZE,
        VacancyFieldAlias::COMPANY_DOMAIN  => self::COMPANY_DOMAIN,
    ];
}
