<?php

namespace App\Infrastructure\Gateway;

interface StarWarsGatewayInterface
{
    public function getPeople(): array;
}
