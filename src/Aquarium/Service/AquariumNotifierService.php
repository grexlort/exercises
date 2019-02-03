<?php declare(strict_types=1);

namespace App\Aquarium\Service;

use App\Aquarium\Model\AquariumNotifierInterface;
use App\Aquarium\Model\LifeForm\LifeFormInterface;
use App\Aquarium\Notifier\{AquariumMailNotifier, AquariumSmsNotifier};

class AquariumNotifierService implements AquariumNotifierInterface
{
    /**
     * @var AquariumNotifierInterface[]
     */
    private $notifyChannels = [];

    public function __construct(AquariumSmsNotifier $smsManager, AquariumMailNotifier $mailManager)
    {
        $this->notifyChannels[] = $smsManager;
        $this->notifyChannels[] = $mailManager;
    }

    public function sendNewLifeFormAddedInformation(LifeFormInterface $lifeForm): void
    {
        foreach ($this->notifyChannels as $channel) {
            $channel->sendNewLifeFormAddedInformation($lifeForm);
        }
    }
}
