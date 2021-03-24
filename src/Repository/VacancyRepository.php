<?php

namespace App\Repository;

use App\Constant\Sorting;
use App\Constant\VacancyFileField;
use App\Model\Vacancy;
use App\Service\DataSource\Constant\FieldType;
use App\Service\DataSource\SourceInterface;
use InvalidArgumentException;

class VacancyRepository implements RepositoryInterface
{
    private array $items = [];

    public function __construct(SourceInterface $source)
    {
        $this->items = $source->load(
            VacancyFileField::ID,
            [
                VacancyFileField::REQUIRED_SKILLS => FieldType::ARRAY
            ]
        );
    }

    /**
     * @param int $id
     *
     * @return Vacancy|null
     */
    public function findOneById(int $id): ?Vacancy
    {
        if (!isset($this->items[$id])) {
            return null;
        }

        return Vacancy::build($this->items[$id]);
    }

    /**
     * Criteria is an array of key-value, e.g. ["fieldName" => "value", "anotherFieldName" => "value"]
     * Sort is key-value, e.g. ["fieldName" => "asc"] or ["fieldName" => "desc"]
     *
     * @param array $criteria
     * @param array $sort
     *
     * @return array
     */
    public function findBy(array $criteria, array $sort = []): array
    {
        $filtered = $this->filterByCriteria($criteria);
        $sorted = $this->sortItems($filtered, $sort);
        $items = array_map(fn($item) => Vacancy::build($item), $sorted);

        return array_values($items);
    }

    /**
     * Sort is key-value: ["fieldName" => "asc"] or ["fieldName" => "desc"]
     *
     * @param array $sort
     *
     * @return Vacancy[]
     */
    public function findAll(array $sort = []): array
    {
        return $this->findBy([], $sort);
    }

    private function filterByCriteria(array $criteria): array
    {
        $criteria = $this->prepareCriteria($criteria);

        if (!count($criteria)) {
            return $this->items;
        }

        $filtered = [];
        foreach ($this->items as $item) {
            foreach ($criteria as $filterName => $filterValue) {
                if (
                    !isset($item[$filterName])
                    || !is_scalar($item[$filterName])
                    || $this->normalizeString($item[$filterName]) !== $filterValue
                ) {
                    continue 2;
                }
            }

            $filtered[] = $item;
        }

        return $filtered;
    }

    /**
     * Filters wrong or empty criteria and normalize key and values
     */
    private function prepareCriteria(array $criteria): array
    {
        $criteria = array_filter(
            $criteria,
            fn($value, $key) => is_string($key) && is_scalar($value),
            ARRAY_FILTER_USE_BOTH
        );

        $normalizedCriteria = [];
        foreach ($criteria as $key => $value) {
            $normalizedKey = $this->normalizeString($key);
            $normalizedValue = $this->normalizeString($value);
            $normalizedCriteria[$normalizedKey] = $normalizedValue;
        }

        $normalizedCriteria = array_filter($normalizedCriteria, fn($value) => !empty($value));

        return $normalizedCriteria;
    }

    private function sortItems(array $items, array $sort): array
    {
        if (!count($sort)) {
            return $items;
        }

        $sortBy = key($sort);
        if (!isset(VacancyFileField::ALIAS_MAP[trim($sortBy)])) {
            return $items;
        }

        $sortBy = $this->normalizeString(
            VacancyFileField::ALIAS_MAP[trim($sortBy)]
        );
        // an element should have field with $sortBy key
        if (!$sortBy || !isset(current($items)[$sortBy])) {
            return $items;
        }

        $sortDirection = $this->normalizeString(current($sort));
        if (!in_array($sortDirection, Sorting::VALUES)) {
            $sortDirection = Sorting::ASC;
        }
        $directionFactor = $sortDirection === Sorting::ASC ? 1 : -1;

        usort($items, static function ($a, $b) use ($sortBy, $directionFactor) {
            if (
                !isset($a[$sortBy])
                || !isset($b[$sortBy])
                || $a[$sortBy] === $b[$sortBy]
            ) {
                return 0;
            }

            $result = ($a[$sortBy] < $b[$sortBy]) ? -1 : 1;

            return $result * $directionFactor;
        });

        return $items;
    }

    private function normalizeString($value): string
    {
        if (!is_scalar($value)) {
            throw new InvalidArgumentException("value should be a string");
        }

        return strtolower(trim((string) $value));
    }
}
