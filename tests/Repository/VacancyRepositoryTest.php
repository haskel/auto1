<?php

namespace App\Tests\Repository;

use App\Model\Vacancy;
use App\Repository\VacancyRepository;
use App\Service\DataSource\CsvFileSource;
use App\Tests\VacanciesDataProvider;
use PHPUnit\Framework\TestCase;
use TypeError;
use stdClass;

class VacancyRepositoryTest extends TestCase
{
    private function getRepositoryWithSpecificItems(array $items): VacancyRepository
    {
        $sourceStub = $this->getMockBuilder(CsvFileSource::class)
                           ->disableOriginalConstructor()
                           ->getMock();
        $sourceStub->method("load")->willReturn($items);

        return new VacancyRepository($sourceStub);
    }

    /**
     * @dataProvider findOneByIdSuccessProvider
     */
    public function testFindOneByIdSuccess($id, $items, $expected)
    {
        $vacancyRepository = $this->getRepositoryWithSpecificItems($items);
        $result = $vacancyRepository->findOneById($id);

        self::assertEquals($expected, $result);
    }

    public function findOneByIdSuccessProvider(): array
    {
        $items = VacanciesDataProvider::getShorListItems();

        return [
            [1,     $items, Vacancy::build($items[1])],
            ["2",   $items, Vacancy::build($items[2])],
            [3,     $items, Vacancy::build($items[3])],
            [10,    $items, null],
            ["100", $items, null],
        ];
    }

    /**
     * @dataProvider findOneByIdFailProvider
     */
    public function testFindOneByIdFail($id, $expectedException)
    {
        $this->expectException($expectedException);

        $vacancyRepository = $this->getRepositoryWithSpecificItems(VacanciesDataProvider::getShorListItems());
        $vacancyRepository->findOneById($id);
    }

    public function findOneByIdFailProvider(): array
    {
        return [
            [[],              TypeError::class],
            ["asdf",          TypeError::class],
            [new \stdClass(), TypeError::class],
        ];
    }

    /**
     * @dataProvider findByCriteriaSuccessProvider
     */
    public function testFindByCriteriaSuccess(array $criteria, array $expected): void
    {
        $vacancyRepository = $this->getRepositoryWithSpecificItems(VacanciesDataProvider::getItems());
        $result = $vacancyRepository->findBy($criteria);
        $resultIds = array_map(fn(Vacancy $vacancy) => (int) $vacancy->getId(), $result);

        self::assertCount(0, array_diff($expected, $resultIds));
    }

    public function findByCriteriaSuccessProvider(): array
    {
        return [
            // successful
            [["country" => "DE"], [1, 2, 3, 4, 5, 6, 7, 8, 9]],
            [["country" => "ES"], [10, 11, 12]],
            [["country" => " DE "], [1, 2, 3, 4, 5, 6, 7, 8, 9]],
            [["country" => "de"], [1, 2, 3, 4, 5, 6, 7, 8, 9]],
            [["country" => ""], range(1, 27)],
            [["" => ""], range(1, 27)],

            // successful combination
            [["country" => "DE", "city" => "Berlin"], [1, 2, 3, 5, 7, 8, 9]],
            [["country" => "ES", "city" => "Barcelona"], [10, 11, 12]],

            // empty result
            [["country" => "def"], []],
            [["country" => "d"], []],
            [["country" => 1], []],
            [["country" => -1], []],
            [["country" => 0], []],
            [["country" => 3.14] , []],
            [["country" => null], []],
            [["country" => []], []],
            [["country" => new stdClass()], []],
            [["unknown" => "unknown"], []],
            [[1 => ""], []],
            [[3.14 => ""], []],

            // empty combination
            [["country" => "DE", "city" => "Barcelona"], []],
            [["country" => "ES", "city" => "Berlin"], []],
        ];
    }

    /**
     * @dataProvider findByCriteriaFailProvider
     */
    public function testFindByCriteriaFail($criteria, $expectedException): void
    {
        $vacancyRepository = $this->getRepositoryWithSpecificItems(VacanciesDataProvider::getShorListItems());

        $this->expectException($expectedException);

        $vacancyRepository->findBy($criteria);
    }

    public function findByCriteriaFailProvider(): array
    {
        return [
            [1, TypeError::class],
            [3.14, TypeError::class],
            ["string", TypeError::class],
            [new stdClass(), TypeError::class],
            [null, TypeError::class],
        ];
    }

    /**
     * @dataProvider findBySortingSuccessProvider
     */
    public function testFindBySortingSuccess(array $sorting, array $expected): void
    {
        $vacancyRepository = $this->getRepositoryWithSpecificItems(VacanciesDataProvider::getDifferentSalariesItems());
        $result = $vacancyRepository->findBy([], $sorting);
        $resultIds = array_map(fn(Vacancy $vacancy) => (int) $vacancy->getId(), $result);

        self::assertSame($resultIds, $expected);
    }

    public function findBySortingSuccessProvider(): array
    {
        $orderedBySalaryAsc = [14, 13, 15, 10, 3, 11, 9, 2, 12, 18, 7, 1, 22, 16, 5, 26, 27, 19, 6, 25, 23];
        $orderedBySalaryDesc = array_reverse($orderedBySalaryAsc);
        $orderedBySeniorityAsc = [3, 14, 13, 16, 26, 7, 9, 11, 22, 2, 18, 25, 23, 1, 15, 12, 10, 6, 5, 19, 27];

        return [
            [["salary" => "asc"], $orderedBySalaryAsc],
            [["salary" => "asc", "some" => "asc"], $orderedBySalaryAsc],
            [["  salary  " => "asc"], $orderedBySalaryAsc],
            [["salary" => "desc"], $orderedBySalaryDesc],
            [["seniorityLevel" => "asc"], $orderedBySeniorityAsc],
        ];
    }

    /**
     * @dataProvider findBySortingNoEffectProvider
     */
    public function testFindBySortingNoEffect(array $sorting): void
    {
        $vacancyRepository = $this->getRepositoryWithSpecificItems(VacanciesDataProvider::getDifferentSalariesItems());
        $expected = $vacancyRepository->findBy([]);
        $result = $vacancyRepository->findBy([], $sorting);
        $expectedIds = array_map(fn(Vacancy $vacancy) => (int) $vacancy->getId(), $expected);
        $resultIds = array_map(fn(Vacancy $vacancy) => (int) $vacancy->getId(), $result);

        self::assertSame($resultIds, $expectedIds);
    }


    public function findBySortingNoEffectProvider()
    {
        return [
            [[1 => "asc"]],
            [["unknown" => "asc"]],
            [[1 => "asc"]],
            [["SALARY" => "asc"]],
            [[3.14 => "asc"]],
            [[[]]],
        ];
    }

    public function testFindAll()
    {
        $items = VacanciesDataProvider::getShorListItems();
        $vacancyRepository = $this->getRepositoryWithSpecificItems($items);

        $result = $vacancyRepository->findAll();

        $vacancies = array_map(fn($item) => Vacancy::build($item), array_values($items));

        self::assertSameSize($vacancies, $result);

        self::assertEquals(get_class(current($vacancies)), get_class(current($result)));
    }
}
