<?php

namespace App\Tests\Application\Infrastructure\Http;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiControllerTest extends WebTestCase
{
    public function testCall()
    {
        $client = static::createClient();

        $client->request('GET', '/api/people');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}