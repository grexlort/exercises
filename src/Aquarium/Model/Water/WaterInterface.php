<?php declare(strict_types=1);

namespace App\Aquarium\Model\Water;

interface WaterInterface
{
    public function clean(int $cleaningLevel): void;

    public function contaminate(): void;
}
