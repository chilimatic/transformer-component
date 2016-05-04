<?php
use chilimatic\lib\Transformer\TransformerFactory;

/**
 * Class InterpreterOperatorFactoryTest
 */
class TransformerFactoryTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function factoryImplementsFactoryOptionsInterface()
    {
        $factory = new TransformerFactory();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFactoryOptions', $factory);
    }


    /**
     * @test
     */
    public function factoryReturnsTransformerBasedOnRelativeNamespaceAndClassName()
    {
        $factory = new TransformerFactory();

        $transformer = $factory->make('String\\DynamicSQLParameter', []);

        self::assertInstanceOf('\chilimatic\lib\Transformer\String\DynamicSQLParameter', $transformer);
    }


    /**
     * @test
     */
    public function factoryReturnsTransformerBasedOnAbsoluteNamespaceAndClassName()
    {
        $factory = new TransformerFactory();

        $transformer = $factory->make('\chilimatic\lib\Transformer\String\DynamicSQLParameter', []);

        self::assertInstanceOf('\chilimatic\lib\Transformer\String\DynamicSQLParameter', $transformer);
    }


    /**
     * @test
     */
    public function factoryReturnsNullBasedOnWrongInput()
    {
        $factory = new TransformerFactory();

        $transformer = $factory->make('thisclassdoesnotexist', []);

        self::assertNull($transformer);
    }
    
}