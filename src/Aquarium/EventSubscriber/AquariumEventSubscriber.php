<?php declare(strict_types=1);

namespace App\Aquarium\EventSubscriber;

use App\Aquarium\Event\NewLifeFormAddedEvent;
use App\Aquarium\Service\AquariumNotifierService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AquariumEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var AquariumNotifierService
     */
    private $notifyService;

    public function __construct(AquariumNotifierService $notifyService)
    {
        $this->notifyService = $notifyService;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            NewLifeFormAddedEvent::NAME => 'onNewLifeFormAdded',
        ];
    }

    public function onNewLifeFormAdded(NewLifeFormAddedEvent $event): void
    {
        $this->notifyService->sendNewLifeFormAddedInformation($event->getLifeForm());
    }
}
