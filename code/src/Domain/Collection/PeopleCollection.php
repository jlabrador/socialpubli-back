<?php

namespace App\Domain\Collection;

use App\Domain\Model\PeopleDto;

class PeopleCollection
{
    public function __construct(
        private ?array $people
    )
    {
        if (is_null($this->people)) {
            $this->people = [];
        }
    }

    public function get(): array
    {
        $result = [];
        foreach ($this->people as $person) {
            $item = (new PeopleDto(
                $this->value($person, 'name'),
                $this->value($person, 'height'),
                $this->value($person, 'mass'),
                $this->value($person, 'hair_color'),
                $this->value($person, 'skin_color'),
                $this->value($person, 'eye_color'),
            ))->serialize();
            $result[] = $item;
        }
        return $result;
    }

    private function value(\stdClass $object, string $property): string
    {
        if (!property_exists($object, $property)) {
            throw new PeopleCollectionException($property);
        }

        return $object->$property;
    }

}