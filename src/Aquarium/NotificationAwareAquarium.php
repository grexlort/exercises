<?php declare(strict_types=1);

namespace App\Aquarium;

use App\Aquarium\Enum\HeaterMode;
use App\Aquarium\Event\NewLifeFormAddedEvent;
use App\Aquarium\Model\{AquariumInterface, LifeForm\LifeFormInterface};
use App\Aquarium\Model\Filter\AquariumFilterInterface;
use App\Aquarium\Model\Food\FoodInterface;
use App\Exception\MissingDependencyException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Decorates Aquarium model to handle notifications.
 */
class NotificationAwareAquarium implements AquariumInterface
{
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var AquariumInterface
     */
    private $aquarium;

    public function __construct(AquariumInterface $aquarium)
    {
        $this->aquarium = $aquarium;
    }

    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): void
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function addLifeForm(LifeFormInterface $lifeForm): AquariumInterface
    {
        if (!$this->eventDispatcher) {
            throw new MissingDependencyException('EventDispatcherInterface instance is needed to handle this action');
        }

        $this->eventDispatcher->dispatch(NewLifeFormAddedEvent::NAME, new NewLifeFormAddedEvent($lifeForm));

        $this->aquarium->addLifeForm($lifeForm);

        return $this;
    }

    public function changeHeaterMode(HeaterMode $mode): AquariumInterface
    {
        $this->aquarium->changeHeaterMode($mode);

        return $this;
    }

    public function switchLightButton(): AquariumInterface
    {
        $this->aquarium->switchLightButton();

        return $this;
    }

    public function feedAnimals(FoodInterface $food): AquariumInterface
    {
        $this->aquarium->feedAnimals($food);

        return $this;
    }

    public function changeFilter(AquariumFilterInterface $filter): AquariumInterface
    {
        $this->aquarium->changeFilter($filter);

        return $this;
    }

    public function filterWater(): AquariumInterface
    {
        $this->aquarium->filterWater();

        return $this;
    }
}
