<?php
use chilimatic\lib\Transformer\String\DynamicObjectCallName;

/**
 * Class DynamicObjectCallNameTest
 */
class DynamicObjectCallNameTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function checkIfFlyWeightInterfaceIsImplemented()
    {
        $transformer = new DynamicObjectCallName();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFlyWeightTransformer', $transformer);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithArray()
    {
        $transformer = new DynamicObjectCallName();

        $string = $transformer(['12']);

        self::assertEquals(['12'], $string);
    }


    /**
     * @test
     */
    public function checkInvokeTransformerWithDelimiterName()
    {
        $transformer = new DynamicObjectCallName();

        $string = $transformer('this-is-my-test');

        self::assertEquals('ThisIsMyTest', $string);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithOutDelimiterAndTheFirstLetterAsLowerCase()
    {
        $transformer = new DynamicObjectCallName();

        $string = $transformer('thisisMyTest');

        self::assertEquals('ThisisMyTest', $string);
    }
}