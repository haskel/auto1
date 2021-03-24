<?php

namespace App\Controller;

use App\Dto\VacancyFilter;
use App\Model\Vacancy;
use App\Service\VacancyService;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use App\Dto\ErrorResponse;
use App\Dto\ValidationErrorResponse;

/**
 * @OA\Tag(name="Vacancies")
 * @Route("/vacancies")
 */
class VacancyController
{
    private VacancyService $vacancyService;

    public function __construct(VacancyService $vacancyService)
    {
        $this->vacancyService = $vacancyService;
    }

    /**
     * Get vacancy by id
     *
     * @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="Vacancy ID",
     *     required="true",
     *     @OA\Schema(type="int")
     * )
     * @OA\Response(
     *     response=200,
     *     description="Returns the vacancy if it exists",
     *     @Model(type=Vacancy::class))
     *     )
     * )
     * @OA\Response(
     *     response=400,
     *     description="Returns an error",
     *     @Model(type=ErrorResponse::class))
     *     )
     * )
     * @Route("/{id}", methods={"GET"})
     *
     * @param int $id
     *
     * @return Vacancy|null
     */
    public function get(int $id): ?Vacancy
    {
        return $this->vacancyService->get($id);
    }

    /**
     * Filter vacancies
     *
     * @OA\Parameter(name="country", in="query", description="Country filter", @OA\Schema(type="string"))
     * @OA\Parameter(name="city", in="query", description="City filter", @OA\Schema(type="string"))
     * @OA\Parameter(name="sortBy", in="query", description="Sorting option", @OA\Schema(type="string"))
     * @OA\Response(
     *     response=200,
     *     description="Returns filtered vacancies",
     *     @OA\Schema(
     *         type="array",
     *         @OA\Items(ref=@Model(type=Vacancy::class))
     *     )
     * )
     * @OA\Response(
     *     response=400,
     *     description="Returns validation error",
     *     @Model(type=ValidationErrorResponse::class))
     *     )
     * )
     *
     * @Route("", methods={"GET"})
     *
     * @param Request $request
     *
     * @return array
     */
    public function filter(Request $request): array
    {
        $filter = new VacancyFilter(
            $request->query->get("country"),
            $request->query->get("city"),
            $request->query->get("sortBy")
        );

        return $this->vacancyService->filter($filter);
    }
}
