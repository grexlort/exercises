<?php declare(strict_types=1);

namespace App\Aquarium\Model\LifeForm;

use App\Aquarium\Model\Food\FoodInterface;

interface FeedAbleAnimalInterface
{
    public function eat(FoodInterface $food);
}
