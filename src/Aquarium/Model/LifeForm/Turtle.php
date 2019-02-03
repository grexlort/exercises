<?php declare(strict_types=1);

namespace App\Aquarium\Model\LifeForm;

use App\Aquarium\Enum\FoodEatingReaction;
use App\Aquarium\Model\Food\{FoodInterface, WetFood};

class Turtle extends AbstractSwimAbleAnimalInterface
{
    protected function startSwimming(): string
    {
        return 'swim_like_a_turtle';
    }

    protected function startEating(FoodInterface $food): FoodEatingReaction
    {
        if ($food instanceof WetFood) {
            return new FoodEatingReaction(FoodEatingReaction::HAPPY);
        }

        return new FoodEatingReaction(FoodEatingReaction::UNHAPPY);
    }
}
