<?php declare(strict_types=1);

namespace App\AdditiveInverseNumbers;

use App\AdditiveInverseNumbers\Model\NumberAndInverseNumberSet;

class AdditiveInverseNumbersService
{
    private const MIN_NUMBER = -10;
    private const MAX_NUMBER = 10;

    /**
     * Find quantity of pairs from in array with n numbers from -10 to 10 (without 0).
     *
     * Algorithm:
     *      Step 1: Iterate over numbers, for each absolute number create NumberAndInverseNumberSet object
     *      Step 2: If numbersSet exists add negative or positive occurrence
     *      Step 3: Count pairs in each numbersSet
     *
     * @see NumberAndInverseNumberSet::countPairs()
     *
     * @param int[] $numbers
     *
     * @return int
     */
    public function findMatchesInArray(array $numbers): int
    {
        /**
         * @var NumberAndInverseNumberSet[]
         *
         * Dictionary<int, NumberAndInverseNumberSet>
         * stores key (absolute number value) and value NumberAndInverseNumberSet (object representation of negative and positive number occurrences)
         */
        $numbersSets = [];

        /** @var int $number */
        foreach ($numbers as $number) {
            if (!(\is_int($number) && 0 !== $number && $number >= self::MIN_NUMBER && $number <= self::MAX_NUMBER)) {
                throw new \InvalidArgumentException(
                    sprintf(
                        'Numbers array should contains only numbers with n numbers from %d to %d (without 0) - %s given',
                        self::MIN_NUMBER,
                        self::MAX_NUMBER,
                        $number
                    )
                );
            }

            $absoluteNumber = abs($number);

            // first occurrence of number
            if (!array_key_exists($absoluteNumber, $numbersSets)) {
                $numbersSets[$absoluteNumber] = new NumberAndInverseNumberSet();
            }

            /** @var NumberAndInverseNumberSet $numbersSet */
            $numbersSet = $numbersSets[$absoluteNumber];

            if ($number > 0) {
                $numbersSet->addPositiveOccurrence();
            } else {
                $numbersSet->addNegativeOccurrence();
            }
        }

        return array_reduce(
            $numbersSets,
            function (int $pairs, NumberAndInverseNumberSet $numberSet): int {
                $pairs += $numberSet->countPairs();

                return $pairs;
            },
            0
        );
    }
}
