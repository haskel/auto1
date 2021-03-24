<?php

namespace App\Service;

use App\Dto\MatchParams;
use App\Model\Vacancy;
use App\Repository\VacancyRepository;

/**
 * The explanation of matching algorithm is in docs/matching.md
 */
class Matcher
{
    private VacancyRepository $vacancyRepository;

    /** @var float experimentally selected weight */
    private float $skillsParamWeight = 1;

    /** @var float experimentally selected weight */
    private float $salaryParamWeight = 2;

    public function __construct(VacancyRepository $vacancyRepository)
    {
        $this->vacancyRepository = $vacancyRepository;
    }

    /**
     * @param MatchParams $params
     *
     * @return Vacancy[]
     */
    public function match(MatchParams $params): array
    {
        $vacancies = $this->vacancyRepository->findAll();

        $ranked = [];
        foreach ($vacancies as $vacancy) {
            $locationRank      = $this->calcLocationRank($vacancy, $params->countries, $params->cities);
            $seniorityRank     = $this->calcSeniorityRank($vacancy, $params->seniorityLevels);
            $companyDomainRank = $this->calcCompanyDomainRank($vacancy, $params->companyDomains);
            $skillRank         = $this->skillsParamWeight * $this->calcSkillsRank($vacancy, $params->skills);
            $salaryRank        = $this->salaryParamWeight * $this->calcSalaryRank($vacancy, $params->salaryExpectation);

            $rank = $locationRank * $seniorityRank * $companyDomainRank * $skillRank * $salaryRank;

            $ranked[] = ["vacancy" => $vacancy, "rank" => $rank];
        }

        usort($ranked, fn ($a, $b) => -1 * ($a["rank"] <=> $b["rank"]));

        return array_map(fn($item) => $item["vacancy"], $ranked);
    }

    /**
     * Get the first result of matching
     *
     * @param MatchParams $params
     *
     * @return Vacancy|null
     */
    public function matchMostRelevant(MatchParams $params): ?Vacancy
    {
        $ranked = $this->match($params);

        if (!count($ranked)) {
            return null;
        }

        return array_shift($ranked);
    }

    private function calcIntersectionsCount(array $firstArray, array $secondArray): int
    {
        if (!count($firstArray) || !count($secondArray)) {
            return 0;
        }

        return count(
            array_intersect(
                array_map(fn($item) => strtolower(trim($item)), $firstArray),
                array_map(fn($item) => strtolower(trim($item)), $secondArray),
            )
        );
    }

    /**
     * Cutoff factor
     */
    private function calcLocationRank(Vacancy $vacancy, array $countries = [], array $cities = []): float
    {
        if (count($countries) === 0 && count($cities) === 0) {
            return 1;
        }

        if (
            $this->calcIntersectionsCount([$vacancy->getCountry()], $countries)
            || $this->calcIntersectionsCount([$vacancy->getCity()], $cities)
        ) {
            return 1;
        }

        return 0;
    }

    /**
     * Cutoff factor
     */
    private function calcSeniorityRank(Vacancy $vacancy, array $seniorityLevels = []): float
    {
        return $this->calcIntersectionsCount([$vacancy->getSeniorityLevel()], $seniorityLevels) ? 1 : 0;
    }

    /**
     * Multiplying factor
     */
    private function calcCompanyDomainRank(Vacancy $vacancy, array $companyDomains = []): float
    {
        return $this->calcIntersectionsCount([$vacancy->getCompanyDomain()], $companyDomains) ? 1.1 : 1;
    }

    /**
     * Multiplying + cutoff factor
     */
    private function calcSkillsRank(Vacancy $vacancy, array $skills = []): float
    {
        if (!count($vacancy->getSkills())) {
            return 1;
        }

        $count = $this->calcIntersectionsCount($vacancy->getSkills(), $skills);

        return 1 + $count / count($vacancy->getSkills());
    }

    /**
     * Multiplying + cutoff factor
     */
    private function calcSalaryRank(Vacancy $vacancy, ?float $salaryExpectation): float
    {
        if (!$salaryExpectation || $salaryExpectation <= 0) {
            return 1;
        }

        if ($salaryExpectation > $vacancy->getSalary()) {
            return 0;
        }

        return $vacancy->getSalary() / $salaryExpectation;
    }
}
