<?php

use chilimatic\lib\Transformer\String\AnnotationValidatorPrependNameSpace;

/**
 * Class AnnotationValidatorPrependNamespaceTest
 */
class AnnotationValidatorPrependNamespaceTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function checkIfFlyWeightInterfaceIsImplemented()
    {
        $transformer = new AnnotationValidatorPrependNameSpace();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFlyWeightTransformer', $transformer);
    }
    
    /**
     * @test
     */
    public function checkTransformerWithEmptyString() 
    {
        $transformer = new AnnotationValidatorPrependNameSpace();

        $string = $transformer->transform('');
        
        self::assertEquals('', $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithClassNameNoNamespaceString()
    {
        $transformer = new AnnotationValidatorPrependNameSpace();

        $string = $transformer->transform('MyClass');

        self::assertEquals('\\MyClass', $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithClassNameWithNamespaceString()
    {
        $transformer = new AnnotationValidatorPrependNameSpace();

        $string = $transformer->transform(
            'MyClass',
            [
                AnnotationValidatorPrependNameSpace::NAMESPACE_OPTION_INDEX => 'test'
            ]
        );

        self::assertEquals('\\test\\MyClass', $string);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithEmptyString()
    {
        $transformer = new AnnotationValidatorPrependNameSpace();
        $string = $transformer('');

        self::assertEquals('', $string);
    }
}