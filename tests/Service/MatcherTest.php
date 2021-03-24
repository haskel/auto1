<?php

namespace App\Tests\Service;

use App\Dto\MatchParams;
use App\Repository\VacancyRepository;
use App\Service\DataSource\CsvFileSource;
use App\Service\Matcher;
use App\Tests\VacanciesDataProvider;
use PHPUnit\Framework\TestCase;

/**
 * It tests only filtering and it does not test matching algorithm
 */
class MatcherTest extends TestCase
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
     * @dataProvider matchProvider
     */
    public function testMatch(array $paramsTemplate, array $itemsTemplates, array $expected): void
    {
        $matchParams = new MatchParams();
        $matchParams->skills = $paramsTemplate["required skills"];
        if (isset($paramsTemplate["cities"])) {
            $matchParams->cities = $paramsTemplate["cities"];
        }
        if (isset($paramsTemplate["countries"])) {
            $matchParams->countries = $paramsTemplate["countries"];
        }
        if (isset($paramsTemplate["salary"])) {
            $matchParams->salaryExpectation = $paramsTemplate["salary"];
        }
        if (isset($paramsTemplate["seniorityLevels"])) {
            $matchParams->seniorityLevels = $paramsTemplate["seniorityLevels"];
        }

        $items = array_values(array_slice(VacanciesDataProvider::getShorListItems(), 0, count($itemsTemplates)));
        $templates = array_values($itemsTemplates);
        foreach ($items as $id => &$item) {
            $template = $templates[$id];
            foreach ($template as $key => $value) {
                $item[$key] = $value;
            }
        }

        $matcher = new Matcher($this->getRepositoryWithSpecificItems($items));
        $result = $matcher->match($matchParams);
        $resultIds = array_map(fn($item) => (int) $item->getId(), $result);

        self::assertCount(0, array_diff($expected, $resultIds));
    }

    public function matchProvider()
    {
        return [
            // intersects 1 skill, should return 2 records
            [
                ["required skills" => ["skill_1", "skill_2", "skill_3"]],
                [
                    ["id" => 1, "required skills" => ["skill_1", "skill_4", "skill_5"]],
                    ["id" => 2, "required skills" => ["skill_1", "skill_6", "skill_7"]],
                ],
                [1, 2]
            ],
            // intersects more than one skill
            [
                ["required skills" => ["skill_1", "skill_2", "skill_3"]],
                [
                    ["id" => 1, "required skills" => ["skill_1", "skill_2", "skill_5"]],
                    ["id" => 2, "required skills" => ["skill_1", "skill_2", "skill_6"]],
                ],
                [1, 2]

            ],
            // there are no required skills intersections
            [
                ["required skills" => ["skill_1", "skill_2", "skill_3"]],
                [
                    ["id" => 1, "required skills" => ["skill_4", "skill_5", "skill_6"]],
                    ["id" => 2, "required skills" => ["skill_5", "skill_6", "skill_7"]],
                ],
                []
            ],
            // filters by city
            [
                [
                    "required skills"  => ["skill_1", "skill_2", "skill_3"],
                    "cities"    => ["Berlin"],
                    "countries" => ["DE"],
                ],
                [
                    [
                        "id"              => 1,
                        "required skills" => ["skill_1", "skill_2", "skill_3"],
                        "city"            => "Munich",
                        "country"         => "DE",
                    ],
                    [
                        "id"              => 2,
                        "required skills" => ["skill_1", "skill_2", "skill_3"],
                        "city"            => "Berlin",
                        "country"         => "DE",
                    ],
                ],
                [2]
            ],
            // filters by country
            //successful
            [
                [
                    "required skills" => ["skill_1", "skill_2", "skill_3"],
                    "countries" => ["DE"]
                ],
                [
                    [
                        "id"              => 1,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "country"         => "DE",
                    ],
                    [
                        "id"              => 2,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "country"         => "ES",
                    ],
                ],
                [1]
            ],
            // fail
            [
                [
                    "required skills" => ["skill_1", "skill_2", "skill_3"],
                    "countries" => ["DE"]
                ],
                [
                    [
                        "id"              => 1,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "country"         => "BE",
                    ],
                    [
                        "id"              => 2,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "country"         => "ES",
                    ],
                ],
                []
            ],
            // filters by minimum salary
            // successful, 1 result
            [
                [
                    "required skills" => ["skill_1", "skill_2", "skill_3"],
                    "salary" => 100000
                ],
                [
                    [
                        "id"              => 1,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "salary"          => 80000,
                    ],
                    [
                        "id"              => 2,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "salary"          => 120000,
                    ],
                ],
                [2]
            ],
            // all filtered
            [
                [
                    "required skills" => ["skill_1", "skill_2", "skill_3"],
                    "salary" => 100000
                ],
                [
                    [
                        "id"              => 1,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "salary"          => 80000,
                    ],
                    [
                        "id"              => 2,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "salary"          => 50000,
                    ],
                ],
                []
            ],
            // filters by seniority level
            // successful, 1 result
            [
                [
                    "required skills" => ["skill_1", "skill_2", "skill_3"],
                    "seniorityLevels" => ["Senior"]
                ],
                [
                    [
                        "id"              => 1,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "seniorityLevel"  => "Senior",
                    ],
                    [
                        "id"              => 2,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "seniorityLevel"  => "Middle",
                    ],
                ],
                [1]
            ],
            // all filtered
            [
                [
                    "required skills" => ["skill_1", "skill_2", "skill_3"],
                    "seniorityLevels" => ["Senior"]
                ],
                [
                    [
                        "id"              => 1,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "seniorityLevel"  => "Middle",
                    ],
                    [
                        "id"              => 2,
                        "required skills" => ["skill_1", "skill_4", "skill_5"],
                        "seniorityLevel"  => "Junior",
                    ],
                ],
                []
            ],
        ];
    }
}
