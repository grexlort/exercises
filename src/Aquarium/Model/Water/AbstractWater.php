<?php declare(strict_types=1);

namespace App\Aquarium\Model\Water;

abstract class AbstractWater implements WaterInterface
{
    public function clean(int $cleaningLevel): void
    {
        // TODO: Implement clean() method.
    }

    public function contaminate(): void
    {
        // TODO: Implement contaminate() method.
    }
}
