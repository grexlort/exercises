<?php declare(strict_types=1);

namespace App\AdditiveInverseNumbers\Model;

use PHPUnit\Framework\TestCase;

class NumberAndInverseNumberSetTest extends TestCase
{
    /**
     * @covers NumberAndInverseNumberSet::countPairs
     */
    public function testCountPairsShouldReturnOne(): void
    {
        $numbersSet = new NumberAndInverseNumberSet();
        $numbersSet->addNegativeOccurrence();
        $numbersSet->addPositiveOccurrence();

        $this->assertEquals(1, $numbersSet->countPairs());
    }

    /**
     * @covers NumberAndInverseNumberSet::countPairs
     */
    public function testCountPairsShouldReturnZero(): void
    {
        $numbersSet = new NumberAndInverseNumberSet();
        $numbersSet->addNegativeOccurrence();

        $this->assertEquals(0, $numbersSet->countPairs());
    }

    /**
     * @covers NumberAndInverseNumberSet::countPairs
     */
    public function testCountPairsWithNonEqualAmountOfOccurrencesShouldReturnOne(): void
    {
        $numbersSet = new NumberAndInverseNumberSet();
        $numbersSet->addNegativeOccurrence();
        $numbersSet->addNegativeOccurrence();
        $numbersSet->addPositiveOccurrence();

        $this->assertEquals(1, $numbersSet->countPairs());
    }
}