<?php

namespace App\Application;

use App\Domain\Collection\PeopleCollection;

class GetPeopleUseCase
{
    public function execute(array $people): array
    {
        return (new PeopleCollection($people))->get();
    }

}