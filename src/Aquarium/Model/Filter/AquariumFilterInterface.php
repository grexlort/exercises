<?php declare(strict_types=1);

namespace App\Aquarium\Model\Filter;

use App\Aquarium\Model\Water\WaterInterface;

interface AquariumFilterInterface
{
    public function filtration(WaterInterface $water): void;
}
