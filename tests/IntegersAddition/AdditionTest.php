<?php declare(strict_types=1);

namespace App\IntegersAddition;

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    /**
     * @covers       Addition::sum
     * @dataProvider validArgumentsDataProvider
     *
     * @param int $a
     * @param int $b
     * @param int $result
     */
    public function testSum(int $a, int $b, int $result): void
    {
        $this->assertEquals($result, (new Addition())->sum($a, $b));
    }

    /**
     * @covers       Addition::sum
     * @dataProvider invalidArgumentsDataProvider
     *
     * @param $a mixed
     * @param $b mixed
     */
    public function testSumWithInvalidArgumentsShouldFail($a, $b): void
    {
        $this->expectException(\InvalidArgumentException::class);

        (new Addition())->sum($a, $b);
    }

    public function validArgumentsDataProvider(): array
    {
        return [
            [1, 1, 2],
            [15, 10, 25],
            [1000, 2000, 3000],
        ];
    }

    public function invalidArgumentsDataProvider(): array
    {
        return [
            ['0', '0'],
            [null, null],
            ['1', '1'],
            [1, '1'],
            ['', 0],
            [4, false],
            ['', false],
            [true, false],
            [10, 'fail'],
            ['fail', 100],
        ];
    }
}
