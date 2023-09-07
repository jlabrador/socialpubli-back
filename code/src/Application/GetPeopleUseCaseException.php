<?php

namespace App\Application;

class GetPeopleUseCaseException extends \Exception
{
    public function __construct(string $property)
    {
        parent::__construct(
            sprintf('"%s" not exists in object.', $property)
        );
    }
}