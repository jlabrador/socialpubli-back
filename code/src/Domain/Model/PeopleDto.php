<?php

namespace App\Domain\Model;

class PeopleDto
{
    public function __construct(
        private string $name,
        private string $height,
        private string $mass,
        private string $hair_color,
        private string $skin_color,
        private string $eye_color

    )
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    public function getMass(): string
    {
        return $this->mass;
    }

    public function getHairColor(): string
    {
        return $this->hair_color;
    }

    public function getSkinColor(): string
    {
        return $this->skin_color;
    }

    public function getEyeColor(): string
    {
        return $this->eye_color;
    }

    public function serialize(): array
    {
        return [
            'name' => $this->name,
            'height' => $this->height,
            'mass' => $this->mass,
            'hair_color' => $this->hair_color,
            'skin_color' => $this->skin_color,
            'eye_color' => $this->eye_color,
        ];
    }

}