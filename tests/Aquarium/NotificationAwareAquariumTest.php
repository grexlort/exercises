<?php declare(strict_types=1);

namespace App\Aquarium;

use App\Aquarium\Enum\HeaterMode;
use App\Aquarium\EventSubscriber\AquariumEventSubscriber;
use App\Aquarium\Model\Aquarium;
use App\Aquarium\Model\Filter\LargeAquariumFilter;
use App\Aquarium\Model\Filter\StandardAquariumFilter;
use App\Aquarium\Model\Food\{DryFood, WetFood};
use App\Aquarium\Model\LifeForm\{Fish, Plant, Turtle};
use App\Aquarium\Model\Water\SaltWater;
use App\Aquarium\Notifier\{AquariumMailNotifier, AquariumSmsNotifier};
use App\Aquarium\Service\AquariumNotifierService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcher;

class NotificationAwareAquariumTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testAquariumClassSystem(): void
    {
        // in real world app AquariumEventListener should be built and registered by DI container

        $aquariumEventSubscriber = new AquariumEventSubscriber(
            new AquariumNotifierService(new AquariumSmsNotifier(), new AquariumMailNotifier())
        );

        $eventDispatcher = new EventDispatcher();
        $eventDispatcher->addSubscriber($aquariumEventSubscriber);

        $aquarium = new Aquarium(new SaltWater(), new StandardAquariumFilter(), new HeaterMode(HeaterMode::STANDARD));

        $notificationAwareAquarium = new NotificationAwareAquarium($aquarium);
        $notificationAwareAquarium->setEventDispatcher($eventDispatcher);

        $notificationAwareAquarium
            ->addLifeForm(new Plant())
            ->addLifeForm(new Fish())
            ->addLifeForm(new Turtle())
            ->feedAnimals(new DryFood())
            ->switchLightButton()
            ->feedAnimals(new WetFood())
            ->switchLightButton()
            ->filterWater()
            ->changeFilter(new LargeAquariumFilter())
            ->filterWater()
            ->changeHeaterMode(new HeaterMode(HeaterMode::BOILING)); // make fish soup
    }
}
