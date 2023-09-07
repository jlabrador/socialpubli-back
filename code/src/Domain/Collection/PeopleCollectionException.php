<?php

namespace App\Domain\Collection;

class PeopleCollectionException extends \Exception
{
    public function __construct(string $property)
    {
        parent::__construct(
            sprintf('"%s" not exists in object.', $property)
        );
    }
}
