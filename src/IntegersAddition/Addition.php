<?php declare(strict_types=1);

namespace App\IntegersAddition;

class Addition
{
    public function sum($a, $b)
    {
        if (!\is_int($a) || !\is_int($b)) {
            throw new \InvalidArgumentException();
        }

        return $a + $b;
    }
}
