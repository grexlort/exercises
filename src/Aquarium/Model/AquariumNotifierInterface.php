<?php declare(strict_types=1);

namespace App\Aquarium\Model;

use App\Aquarium\Model\LifeForm\LifeFormInterface;

interface AquariumNotifierInterface
{
    public function sendNewLifeFormAddedInformation(LifeFormInterface $lifeForm): void;
}
