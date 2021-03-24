<?php

namespace App\Model;

use App\Constant\VacancyFileField;

class Vacancy
{
    private int $id;

    private string $country;
    private string $city;

    private string $title;
    private string $seniorityLevel;

    /** @var string[]  */
    private array $skills;

    private float $salary;
    private string $currency;

    private string $companySize;
    private string $companyDomain;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Vacancy
    {
        $this->id = $id;

        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): Vacancy
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): Vacancy
    {
        $this->city = $city;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Vacancy
    {
        $this->title = $title;

        return $this;
    }

    public function getSeniorityLevel(): string
    {
        return $this->seniorityLevel;
    }

    public function setSeniorityLevel(string $seniorityLevel): Vacancy
    {
        $this->seniorityLevel = $seniorityLevel;

        return $this;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function setSkills(array $skills): Vacancy
    {
        $this->skills = $skills;

        return $this;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function setSalary(float $salary): Vacancy
    {
        $this->salary = $salary;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): Vacancy
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCompanySize(): string
    {
        return $this->companySize;
    }

    public function setCompanySize(string $companySize): Vacancy
    {
        $this->companySize = $companySize;

        return $this;
    }

    public function getCompanyDomain(): string
    {
        return $this->companyDomain;
    }

    public function setCompanyDomain(string $companyDomain): Vacancy
    {
        $this->companyDomain = $companyDomain;

        return $this;
    }

    public static function build(array $item): Vacancy
    {
        $vacancy = new self();
        $vacancy->setId($item[strtolower(VacancyFileField::ID)])
            ->setCountry($item[strtolower(VacancyFileField::COUNTRY)])
            ->setCity($item[strtolower(VacancyFileField::CITY)])
            ->setTitle($item[strtolower(VacancyFileField::JOB_TITLE)])
            ->setSeniorityLevel($item[strtolower(VacancyFileField::SENIORITY_LEVEL)])
            ->setSkills($item[strtolower(VacancyFileField::REQUIRED_SKILLS)])
            ->setSalary($item[strtolower(VacancyFileField::SALARY)])
            ->setCurrency($item[strtolower(VacancyFileField::CURRENCY)])
            ->setCompanyDomain($item[strtolower(VacancyFileField::COMPANY_DOMAIN)])
            ->setCompanySize($item[strtolower(VacancyFileField::COMPANY_SIZE)]);

        return $vacancy;
    }
}
