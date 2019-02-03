<?php declare(strict_types=1);

namespace App\Aquarium\Model;

use App\Aquarium\Enum\HeaterMode;
use App\Aquarium\Model\Filter\{AquariumFilterInterface};
use App\Aquarium\Model\Food\FoodInterface;
use App\Aquarium\Model\LifeForm\{
    AbstractBreathAbleLifeForm,
    FeedAbleAnimalInterface,
    LifeFormInterface,
    SwimAbleInterface
};
use App\Aquarium\Model\Water\WaterInterface;

class Aquarium implements AquariumInterface
{
    /**
     * @var AbstractBreathAbleLifeForm[]
     */
    private $lifeForms;

    /**
     * @var WaterInterface
     */
    private $water;

    /**
     * @var AquariumFilterInterface
     */
    private $filter;

    /**
     * @var HeaterMode
     */
    private $heaterMode;

    /**
     * @var bool
     */
    private $isLightEnabled;

    public function __construct(WaterInterface $water, AquariumFilterInterface $filter, HeaterMode $heaterMode)
    {
        $this->lifeForms = [];
        $this->water = $water;
        $this->filter = $filter;
        $this->heaterMode = $heaterMode;
        $this->isLightEnabled = false;
    }

    public function addLifeForm(LifeFormInterface $lifeForm): AquariumInterface
    {
        $this->lifeForms[] = $lifeForm;

        return $this;
    }

    public function changeHeaterMode(HeaterMode $mode): AquariumInterface
    {
        $this->heaterMode = $mode;

        return $this;
    }

    /**
     * Switching light button trigger swim-able life form to start or stop swimming.
     */
    public function switchLightButton(): AquariumInterface
    {
        $this->isLightEnabled = !$this->isLightEnabled;

        foreach ($this->lifeForms as $lifeForm) {
            if ($lifeForm instanceof SwimAbleInterface) {
                $lifeForm->swim();
            }
        }

        return $this;
    }

    /**
     * Feed all animals in aquarium, in results water in aquarium became more contaminated.
     */
    public function feedAnimals(FoodInterface $food): AquariumInterface
    {
        $this->water->contaminate();

        foreach ($this->lifeForms as $lifeForm) {
            if ($lifeForm instanceof FeedAbleAnimalInterface) {
                $lifeForm->eat($food);
            }
        }

        return $this;
    }

    public function changeFilter(AquariumFilterInterface $filter): AquariumInterface
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Trigger water filtration process reduce level of water contamination.
     */
    public function filterWater(): AquariumInterface
    {
        $this->filter->filtration($this->water);

        return $this;
    }
}
