<?php
use chilimatic\lib\Transformer\String\DynamicSQLParameter;

/**
 * Class DynamicSQLParameterTest
 */
class DynamicSQLParameterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function checkIfFlyWeightInterfaceIsImplemented()
    {
        $transformer = new DynamicSQLParameter();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFlyWeightTransformer', $transformer);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithArray()
    {
        $transformer = new DynamicSQLParameter();

        $string = $transformer(['12']);

        self::assertEquals(['12'], $string);
    }

    /**
     * @test
     */
    public function checkTransformWithKeyString()
    {
        $transformer = new DynamicSQLParameter();

        $string = $transformer->transform('randomStringThatMeansSomething');
        $result = DynamicSQLParameter::TRANSFORM_PREFIX . md5('randomStringThatMeansSomething');

        self::assertEquals($result, $string);
    }
}