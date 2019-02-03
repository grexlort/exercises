<?php declare(strict_types=1);

namespace App\Aquarium\Enum;

use MyCLabs\Enum\Enum;

class HeaterMode extends Enum
{
    public const OFF = 'off';
    public const STANDARD = 'standard';
    public const BOILING = 'boiling';
}
