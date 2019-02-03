<?php declare(strict_types=1);

namespace App\Aquarium\Model;

use App\Aquarium\Enum\HeaterMode;
use App\Aquarium\Model\Filter\AquariumFilterInterface;
use App\Aquarium\Model\Food\FoodInterface;
use App\Aquarium\Model\LifeForm\LifeFormInterface;

interface AquariumInterface
{
    public function addLifeForm(LifeFormInterface $lifeForm): self;

    public function changeHeaterMode(HeaterMode $mode): self;

    public function switchLightButton(): self;

    public function feedAnimals(FoodInterface $food): self;

    public function changeFilter(AquariumFilterInterface $filter): self;

    public function filterWater(): self;
}
