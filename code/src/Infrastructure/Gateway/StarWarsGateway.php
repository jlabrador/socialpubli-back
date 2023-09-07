<?php

namespace App\Infrastructure\Gateway;

use App\Application\GetPeopleUseCase;
use App\Application\GetPeopleUseCaseException;
use App\Domain\Collection\PeopleCollection;
use GuzzleHttp\Client;

class StarWarsGateway implements StarWarsGatewayInterface
{
    const API_BASE_URI = 'https://swapi.dev/api/';

    private Client $client;

    public function __construct(
        private GetPeopleUseCase $getPeopleUseCase
    )
    {
        $this->client = new Client(['base_uri' => self::API_BASE_URI]);
    }

    private function getResults(
        \stdClass $content
    )
    {
        if (!property_exists($content, 'results')) {
            throw new GetPeopleUseCaseException('results');
        }

        return $content->results;
    }

    public function getPeople(): array
    {
        $response = $this->client->request('GET', 'people');
        $responseSerialize = $this->getResults(
            json_decode($response->getBody()->getContents())
        );

        return $this->getPeopleUseCase->execute($responseSerialize);
    }
}