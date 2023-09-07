<?php

namespace App\Infrastructure\Http;

use App\Infrastructure\Gateway\StarWarsGateway;
use MongoDB\Driver\Exception\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;
use Nelmio\ApiDocBundle\Annotation\Model;
use App\Domain\Model\PeopleDto;

class ApiController extends AbstractController
{
    #[Route('/api/people', name: 'api_people', methods: ['GET'])]
    /**
     * @OA\Response(
     * response=200,
     * description="Returns the rewards of an user",
     * @OA\JsonContent(
     * type="array",
     * @OA\Items(ref=@Model(type=PeopleDto::class, groups={"full"}))
     * )
     * )
     * /
     */
    public function index(StarWarsGateway $starWarsGateway): JsonResponse
    {
        try {
            return $this->json([
                "data" => $starWarsGateway->getPeople(),
            ]);
        } catch (Exception $exception) {
            return $this->json([
                "error" => $exception->getMessage(),
                "code" => $exception->getCode()
            ],
            $exception->getCode());
        }

    }
}