<?php declare(strict_types=1);

namespace App\Aquarium\Model\LifeForm;

abstract class AbstractBreathAbleLifeForm extends AbstractLifeForm implements BreathAbleInterface
{
    public function breath(): string
    {
        return 'breathing';
    }
}
