<?php declare(strict_types=1);

namespace App\AdditiveInverseNumbers\Model;

class NumberAndInverseNumberSet
{
    /** @var int */
    private $negative = 0;

    /** @var int */
    private $positive = 0;

    public function addNegativeOccurrence(): void
    {
        ++$this->negative;
    }

    public function addPositiveOccurrence(): void
    {
        ++$this->positive;
    }

    /**
     * Return pairs based on minimal value
     * eg. [-1, -1, -1, 1, 1] became negative: 3, positive 2, so there is only 2 pairs, one negative number is without pair
     */
    public function countPairs(): int
    {
        return min($this->negative, $this->positive);
    }
}
