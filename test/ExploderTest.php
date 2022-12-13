<?php

use Lenovo\TestApp\Exploder;
use PHPUnit\Framework\TestCase;

class ExploderTest extends TestCase 
{
    /**
     * @dataProvider getExplodeData
     */
    public function testExplodeSimple(string $separator, string $value)
    {

        $exploder = new Exploder();
        $result = $exploder->explode($separator, $value);
        $expectedResult = explode($separator, $value);

        $this->assertEquals($expectedResult, $result);
    }

    public function getExplodeData(): array
    {
        return [
            [";", "toto;titi;tata"],
            ["|", "1|2|3"],
            ["!", "truc!bidule!machin chose!etc!et autres"],
            [":", "il n'y en a pas"],
            [":", ":::::"],
            ["et", "des pommes et des carottes et des choux et des bananes et des fraises"],
        ];
    }


    /**
     * @dataProvider getExplodeWithLimitData
     */
    public function testExplodeWithLimit(string $separator, string $value, int $limit)
    {

        $exploder = new Exploder();
        $result = $exploder->explode($separator, $value, $limit);
        $expectedResult = explode($separator, $value, $limit);

        $this->assertEquals($expectedResult, $result);
    }

    public function getExplodeWithLimitData(): array
    {
        return [
            [";", "toto;titi;tata", 1],
            ["|", "1|2|3", 4],
            ["!", "truc!bidule!machin chose!etc!et autres", 2],
            [":", "il n'y en a pas", 8],
            [":", ":::::", 2],
            ["et", "des pommes et des carottes et des choux et des bananes et des fraises", 3],
        ];
    }
}