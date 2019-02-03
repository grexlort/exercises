<?php declare(strict_types=1);

namespace App\Aquarium\Event;

use App\Aquarium\Model\LifeForm\LifeFormInterface;
use Symfony\Component\EventDispatcher\Event;

/**
 * The aquarium.new_life_form_added event is dispatched each time new life form instance is added to aquarium.
 */
class NewLifeFormAddedEvent extends Event
{
    public const NAME = 'aquarium.new_life_form_added';

    /**-
     * @var LifeFormInterface
     */
    protected $lifeForm;

    public function __construct(LifeFormInterface $lifeForm)
    {
        $this->lifeForm = $lifeForm;
    }

    public function getLifeForm(): LifeFormInterface
    {
        return $this->lifeForm;
    }
}
