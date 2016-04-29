<?php
use chilimatic\lib\Transformer\String\DynamicFunctionCallName;

/**
 * Class DynameicFunctionCallNameTest
 */
class DynamicFunctionCallNameTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function checkIfFlyWeightInterfaceIsImplemented()
    {
        $transformer = new DynamicFunctionCallName();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFlyWeightTransformer', $transformer);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithArray()
    {
        $transformer = new DynamicFunctionCallName();

        $string = $transformer(['12']);

        self::assertEquals(['12'], $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithUpperCaseFunctionName()
    {
        $transformer = new DynamicFunctionCallName();

        $string = $transformer('MyFunctionName');

        self::assertEquals('myFunctionName', $string);
    }


    /**
     * @test
     */
    public function checkTransformerWithDelimiterName()
    {
        $transformer = new DynamicFunctionCallName();

        $string = $transformer('my-function-name');

        self::assertEquals('myFunctionName', $string);
    }
}