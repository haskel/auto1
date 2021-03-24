<?php

namespace App\Controller;

use App\Dto\MatchParams;
use App\Model\Vacancy;
use App\Service\VacancyService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use App\Dto\ErrorResponse;
use App\Exception\ValidationException;

/**
 * @OA\Tag(name="Matching")
 * @Route("/matching")
 */
class MatchController
{
    private VacancyService $vacancyService;

    public function __construct(VacancyService $vacancyService)
    {
        $this->vacancyService = $vacancyService;
    }

    /**
     * Match the most relevant vacancy by candidate parameters
     *
     * @OA\Parameter(
     *     name="skills[]", in="query", description="List of preferred skills",
     *     @OA\Schema(type="array", @OA\Items(type="string"))
     * )
     * @OA\Parameter(
     *     name="seniorityLevels[]", in="query", description="List of preferred senioriy levels",
     *     @OA\Schema(type="array", @OA\Items(type="string"))
     * )
     * @OA\Parameter(
     *     name="cities[]", in="query", description="List of coities",
     *     @OA\Schema(type="array", @OA\Items(type="string"))
     * )
     * @OA\Parameter(
     *     name="countries[]", in="query", description="List of countries",
     *     @OA\Schema(type="array", @OA\Items(type="string"))
     * )
     * @OA\Parameter(
     *     name="companyDomains[]", in="query", description="Lis of companies domains",
     *     @OA\Schema(type="array", @OA\Items(type="string"))
     * )
     * @OA\Parameter(
     *     name="salaryExpectation", in="query", description="Candidate salary expectation",
     *     @OA\Schema(type="array", @OA\Items(type="string"))
     * )
     * @OA\Response(
     *     response=200,
     *     description="The most relevant vacancy",
     *     @OA\Schema(
     *         type="array",
     *         @OA\Items(ref=@Model(type=Vacancy::class))
     *     )
     * )
     * @OA\Response(
     *     response=400,
     *     description="Returns validation error",
     *     @Model(type=ErrorResponse::class))
     *     )
     * )
     *
     * @Route("/best", methods={"GET"})
     *
     * @param Request $request
     *
     * @return Vacancy|null
     * @throws ValidationException
     */
    public function matchTheBest(Request $request): ?Vacancy
    {
        $params = new MatchParams();
        $params
            ->setSkills($request->get("skills", []))
            ->setSeniorityLevels($request->get("seniorityLevels", []))
            ->setCities($request->get("cities", []))
            ->setCountries($request->get("countries", []))
            ->setCompanyDomains($request->get("companyDomains", []))
            ->setSalaryExpectation((float) $request->get("salaryExpectation", 0));

        return $this->vacancyService->matchMostRelevant($params);
    }
}
