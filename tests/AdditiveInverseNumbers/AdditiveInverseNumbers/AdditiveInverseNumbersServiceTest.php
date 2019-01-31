<?php declare(strict_types=1);

namespace App\AdditiveInverseNumbers;

use PHPUnit\Framework\TestCase;

class AdditiveInverseNumbersServiceTest extends TestCase
{
    /**
     * @covers       AdditiveInverseNumbersService::findMatchesInArray
     * @dataProvider validArgumentsDataProvider
     *
     * @param int   $pairs
     * @param array $numbers
     */
    public function testFindMatchesInArray(int $pairs, array $numbers): void
    {
        $additiveInverseNumbersService = new AdditiveInverseNumbersService();

        $this->assertEquals($pairs, $additiveInverseNumbersService->findMatchesInArray($numbers));
    }

    /**
     * @covers       AdditiveInverseNumbersService::findMatchesInArray
     * @dataProvider invalidArgumentsDataProvider
     *
     * @param array $numbers
     */
    public function testFindMatchesInArrayShouldFail(array $numbers): void
    {
        $this->expectException(\InvalidArgumentException::class);

        (new AdditiveInverseNumbersService())->findMatchesInArray($numbers);
    }

    public function validArgumentsDataProvider(): array
    {
        return [
            [5, [3, 6, -3, 5, -10, 3, 10, 1, 7, -1, -9, -8, 7, 7, -7, -2, -7]],
            [0, []],
            [0, [1, 2, 3]],
            [1, [1, -1]],
            [2, [1, -1, 2, 2, -2]],
        ];
    }

    public function invalidArgumentsDataProvider(): array
    {
        return [
            [[2, -2, -3, 0]],
            [[-12, -2, -3, 2]],
            [[null, 1, false, 'fail']],
            [[1, 1, 2, 'fail']],
        ];
    }
}