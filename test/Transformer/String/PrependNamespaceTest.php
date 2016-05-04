<?php

use chilimatic\lib\Transformer\String\PrependNamespace;

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
        $transformer = new PrependNamespace();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFlyWeightTransformer', $transformer);
    }
    
    /**
     * @test
     */
    public function checkTransformerWithEmptyString() 
    {
        $transformer = new PrependNamespace();

        $string = $transformer->transform('');
        
        self::assertEquals('', $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithClassNameNoNamespaceString()
    {
        $transformer = new PrependNamespace();

        $string = $transformer->transform('MyClass');

        self::assertEquals('\\MyClass', $string);
    }

    /**
     * @test
     */
    public function checkTransformerWithClassNameWithNamespaceString()
    {
        $transformer = new PrependNamespace();

        $string = $transformer->transform(
            'MyClass',
            [
                PrependNamespace::NAMESPACE_OPTION_INDEX => 'test'
            ]
        );

        self::assertEquals('\\test\\MyClass', $string);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithEmptyString()
    {
        $transformer = new PrependNamespace();
        $string = $transformer('');

        self::assertEquals('', $string);
    }
}