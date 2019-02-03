<?php declare(strict_types=1);

namespace App\Aquarium\Model\LifeForm;

abstract class AbstractLifeForm implements LifeFormInterface
{
    public function getName(): string
    {
        return \get_class($this);
    }
}
