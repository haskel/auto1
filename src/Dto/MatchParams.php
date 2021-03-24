<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class MatchParams
{
    /**
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Type(type="string")
     * })
     */
    public array $skills = [];

    /**
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Type(type="string")
     * })
     */
    public array $seniorityLevels = [];

    /**
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Type(type="string")
     * })
     */
    public array $cities = [];

    /**
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Type(type="string"),
     *     @Assert\Length(min=2, max=2)
     * })
     */
    public array $countries = [];

    /**
     * @Assert\All({
     *     @Assert\NotBlank,
     *     @Assert\Type(type="string")
     * })
     */
    public array $companyDomains = [];

    /**
     * @Assert\GreaterThanOrEqual(0)
     */
    public float $salaryExpectation = 0;

    public function setSkills(array $skills): MatchParams
    {
        $this->skills = $skills;

        return $this;
    }

    public function setSeniorityLevels(array $seniorityLevels): MatchParams
    {
        $this->seniorityLevels = $seniorityLevels;

        return $this;
    }

    public function setCities(array $cities): MatchParams
    {
        $this->cities = $cities;

        return $this;
    }

    public function setCountries(array $countries): MatchParams
    {
        $this->countries = $countries;

        return $this;
    }

    public function setCompanyDomains(array $companyDomains): MatchParams
    {
        $this->companyDomains = $companyDomains;

        return $this;
    }

    public function setSalaryExpectation(float $salaryExpectation): MatchParams
    {
        $this->salaryExpectation = $salaryExpectation;

        return $this;
    }
}
