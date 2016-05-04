<?php
use chilimatic\lib\Transformer\String\UnderScoreToCamelCase;


class UnderScoreToCamelCaseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function checkIfFlyWeightInterfaceIsImplemented()
    {
        $transformer = new UnderScoreToCamelCase();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFlyWeightTransformer', $transformer);
    }


    /**
     * @test
     */
    public function checkTransformerWithEmptyString() 
    {
        $transformer = new UnderScoreToCamelCase();

        $string = $transformer->transform('');
        
        self::assertEquals('', $string);
    }


    /**
     * @test
     */
    public function checkTransformerWithLowerCaseClassName()
    {
        $transformer = new UnderScoreToCamelCase();

        $string = $transformer->transform('my_Class');

        self::assertEquals('myClass', $string);
    }


    /**
     * @test
     */
    public function checkTransformerWithNamespaceLowerCaseClassName()
    {
        $transformer = new UnderScoreToCamelCase();

        $string = $transformer->transform('MyClass');

        self::assertEquals('MyClass', $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithNamespaceUpperCaseClassName()
    {
        $transformer = new UnderScoreToCamelCase();

        $string = $transformer->transform('My_Class');

        self::assertEquals('MyClass', $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithInteger()
    {
        $transformer = new UnderScoreToCamelCase();

        $string = $transformer->transform(23);

        self::assertEquals(23, $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithArray()
    {
        $transformer = new UnderScoreToCamelCase();

        $string = $transformer->transform(['12']);

        self::assertEquals(['12'], $string);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithArray()
    {
        $transformer = new UnderScoreToCamelCase();

        $string = $transformer(['12']);

        self::assertEquals(['12'], $string);
    }
}