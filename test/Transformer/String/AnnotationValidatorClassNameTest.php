<?php
use chilimatic\lib\Transformer\String\AnnotationValidatorClassName;

/**
 * Class InterpreterOperatorFactoryTest
 */
class AnnotationValidatorClassNameTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function checkIfFlyWeightInterfaceIsImplemented()
    {
        $transformer = new AnnotationValidatorClassName();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFlyWeightTransformer', $transformer);
    }


    /**
     * @test
     */
    public function checkTransformerWithEmptyString() 
    {
        $transformer = new AnnotationValidatorClassName();

        $string = $transformer->transform('');
        
        self::assertEquals('', $string);
    }


    /**
     * @test
     */
    public function checkTransformerWithLowerCaseClassName()
    {
        $transformer = new AnnotationValidatorClassName();

        $string = $transformer->transform('myClass');

        self::assertEquals('MyClass', $string);
    }


    /**
     * @test
     */
    public function checkTransformerWithNamespaceLowerCaseClassName()
    {
        $transformer = new AnnotationValidatorClassName();

        $string = $transformer->transform('test\\myClass');

        self::assertEquals('test\\MyClass', $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithInteger()
    {
        $transformer = new AnnotationValidatorClassName();

        $string = $transformer->transform(23);

        self::assertEquals(23, $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithArray()
    {
        $transformer = new AnnotationValidatorClassName();

        $string = $transformer->transform(['12']);

        self::assertEquals(['12'], $string);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithArray()
    {
        $transformer = new AnnotationValidatorClassName();

        $string = $transformer(['12']);

        self::assertEquals(['12'], $string);
    }
}