<?php declare(strict_types=1);

namespace App\Aquarium\Notifier;

use App\Aquarium\Model\AquariumNotifierInterface;
use App\Aquarium\Model\LifeForm\LifeFormInterface;

final class AquariumSmsNotifier extends AbstractNotifier implements AquariumNotifierInterface
{
    public function sendNewLifeFormAddedInformation(LifeFormInterface $lifeForm): void
    {
        // TODO: Implement sendNewLifeFormAddedInformation() method.
    }
}
