<?php

namespace App\Service;

use App\Constant\Sorting;
use App\Constant\VacancyFieldAlias;
use App\Dto\MatchParams;
use App\Dto\VacancyFilter;
use App\Exception\AppPublicException;
use App\Exception\NotFoundException;
use App\Exception\ValidationException;
use App\Model\Vacancy;
use App\Repository\VacancyRepository;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Exception;

class VacancyService
{
    private VacancyRepository $vacancyRepository;

    private Matcher $matcher;

    private ValidatorInterface $validator;

    public function __construct(
        VacancyRepository $vacancyRepository,
        Matcher $matcher,
        ValidatorInterface $validator
    ) {
        $this->vacancyRepository = $vacancyRepository;
        $this->matcher = $matcher;
        $this->validator = $validator;
    }

    /**
     * @param int $id
     *
     * @return Vacancy
     * @throws AppPublicException
     */
    public function get(int $id): Vacancy
    {
        if ($id <= 0) {
            throw new AppPublicException(sprintf("Incorrect id: %s", $id));
        }

        $vacancy = $this->vacancyRepository->findOneById($id);
        if (!$vacancy) {
            throw new NotFoundException("Vacancy not found");
        }

        return $vacancy;
    }

    /**
     * @param VacancyFilter $filter
     *
     * @return Vacancy[]
     * @throws ValidationException
     */
    public function filter(VacancyFilter $filter): array
    {
        $this->validate($filter);

        $filters = [];
        if ($filter->country) {
            $filters[VacancyFieldAlias::COUNTRY] = $filter->country;
        }
        if ($filter->city) {
            $filters[VacancyFieldAlias::CITY] = $filter->city;
        }

        $sorting = [];
        if ($filter->sortBy) {
            $sorting[$filter->sortBy] = Sorting::ASC;
        }

        return $this->vacancyRepository->findBy($filters, $sorting);
    }

    /**
     * @param MatchParams $params
     *
     * @return Vacancy[]
     * @throws ValidationException
     */
    public function match(MatchParams $params): array
    {
        $this->validate($params);

        return $this->matcher->match($params);
    }

    /**
     * @param MatchParams $params
     *
     * @return Vacancy|null
     * @throws ValidationException
     */
    public function matchMostRelevant(MatchParams $params): ?Vacancy
    {
        $this->validate($params);

        return $this->matcher->matchMostRelevant($params);
    }

    private function validate(object $object): void
    {
        $errors = $this->validator->validate($object);
        if (!$errors->count()) {
            return;
        }

        $errorsList = [];
        foreach ($errors as $error) {
            $errorsList[] = $error;
        }

        throw new ValidationException($errorsList);
    }
}
