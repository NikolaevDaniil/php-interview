<?php
declare(strict_types=1);

use Daniil\PhpInterview\FirstTask;
use PHPUnit\Framework\TestCase;

class FirstTaskTest extends TestCase
{
    public function setUp(): void
    {
        $this->array = [
            ['id' => 1, 'date' => '12.01.2020', 'name' => 'test1'],
            ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
            ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4'],
            ['id' => 1, 'date' => '22.01.2020', 'name' => 'test1'],
            ['id' => 2, 'date' => '11.11.2020', 'name' => 'test4'],
            ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3'],
        ];

        parent::setUp();
    }

    public function testUniqueIdInArray(): void
    {
        $expectedResult = [
            ['id' => 1, 'date' => '12.01.2020', 'name' => 'test1'],
            ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
            ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4'],
            ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3'],
        ];

        $object = new FirstTask();
        $result = $object->uniqueIdInArray($this->array);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider provideData
     */
    public function testSortMultiDimensionalArray($key, $array): void
    {
        $object = new FirstTask();
        $result = $object->sortMultidimensionalArray($this->array, $key);

        $this->assertEquals($array, $result);
    }

    public function testFilterArrayByCondition(): void
    {
        $expected = [['id' => 1, 'date' => '12.01.2020', 'name' => 'test1']];
        $object = new FirstTask();
        $result = $object->filterArrayByCondition($this->array, 'date', '12.01.2020');

        $this->assertEquals($expected, $result);
    }
    public function testArrayRevers(): void
    {
        $expected = [
            ['test1' => 1],
            ['test2' => 2],
            ['test4' => 4],
            ['test1' => 1],
            ['test4' => 2],
            ['test3' => 3]
        ];
        $object = new FirstTask();
        $result = $object->reverseKeyAndValues($this->array, 'name', 'id');

        $this->assertEquals($expected, $result);
    }

    public function provideData(): array
    {
        return [
            [
                'id',
                [
                    ['id' => 1, 'date' => '12.01.2020', 'name' => 'test1'],
                    ['id' => 1, 'date' => '22.01.2020', 'name' => 'test1'],
                    ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
                    ['id' => 2, 'date' => '11.11.2020', 'name' => 'test4'],
                    ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3'],
                    ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4']
                ]
            ],
            [
                'date',
                [
                    ['id' => 1, 'date' => '12.01.2020', 'name' => 'test1'],
                    ['id' => 1, 'date' => '22.01.2020', 'name' => 'test1'],
                    ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4'],
                    ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
                    ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3'],
                    ['id' => 2, 'date' => '11.11.2020', 'name' => 'test4'],
                ]
            ],
            [
                'name',
                [
                    ['id' => 1, 'date' => '12.01.2020', 'name' => 'test1'],
                    ['id' => 1, 'date' => '22.01.2020', 'name' => 'test1'],
                    ['id' => 2, 'date' => '02.05.2020', 'name' => 'test2'],
                    ['id' => 3, 'date' => '06.06.2020', 'name' => 'test3'],
                    ['id' => 4, 'date' => '08.03.2020', 'name' => 'test4'],
                    ['id' => 2, 'date' => '11.11.2020', 'name' => 'test4'],
                ]
            ],
        ];
    }
}
