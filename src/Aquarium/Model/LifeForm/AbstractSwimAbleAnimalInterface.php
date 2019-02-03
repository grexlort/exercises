<?php declare(strict_types=1);

namespace App\Aquarium\Model\LifeForm;

use App\Aquarium\Enum\FoodEatingReaction;
use App\Aquarium\Model\Food\FoodInterface;

abstract class AbstractSwimAbleAnimalInterface extends AbstractBreathAbleLifeForm implements FeedAbleAnimalInterface, SwimAbleInterface
{
    /**
     * @var bool
     */
    protected $isSwimming = true;

    /**
     * @var bool
     */
    protected $isHungry = true;

    /**
     * Detailed implementation of custom swimming style.
     */
    abstract protected function startSwimming(): string;

    /**
     * Detailed implementation of food eating process.
     */
    abstract protected function startEating(FoodInterface $food): FoodEatingReaction;

    /**
     * @return $this
     */
    public function swim(): self
    {
        $this->isSwimming = !$this->isSwimming;

        if ($this->isSwimming) {
            $this->startSwimming();
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function eat(FoodInterface $food): self
    {
        if ($this->isHungry) {
            $this->startEating($food);
        }

        $this->isHungry = !$this->isHungry;

        return $this;
    }
}
