<?php

namespace App\Infrastructure\Http;

use App\Domain\Model\PeopleDto;
use App\Infrastructure\Gateway\StarWarsGateway;
use MongoDB\Driver\Exception\Exception;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Psr\Cache\CacheItemInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\CacheInterface;

class ApiController extends AbstractController
{
    #[Route('/api/people', name: 'api_people', methods: ['GET'])]
    /**
     * @OA\Response(
     * response=200,
     * description="Returns the rewards of an user",
     *
     * @OA\JsonContent(
     * type="array",
     *
     * @OA\Items(ref=@Model(type=PeopleDto::class, groups={"full"}))
     * )
     * )
     * /
     */
    public function index(
        StarWarsGateway $starWarsGateway,
        CacheInterface $cache
    ): JsonResponse {
        try {
            $data = $cache->get('people_data', function (CacheItemInterface $cacheItem) use ($starWarsGateway) {
                $cacheItem->expiresAfter((int)$_SERVER['CACHE_TIME_EXPIRE']);

                return $starWarsGateway->getPeople();
            });

            return $this->json([
                'data' => $data,
            ]);
        } catch (Exception $exception) {
            return $this->json([
                'error' => $exception->getMessage(),
                'code' => $exception->getCode(),
            ],
                $exception->getCode());
        }
    }
}
