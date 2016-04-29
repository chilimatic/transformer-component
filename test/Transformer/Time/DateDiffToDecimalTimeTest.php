<?php

use chilimatic\lib\Transformer\Time\DateDiffToDecimalTime;

/**
 * Class DateDiffToDecimalTimeTest
 */
class DateDiffToDecimalTimeTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function checkIfFlyWeightInterfaceIsImplemented()
    {
        $transformer = new DateDiffToDecimalTime();

        self::assertInstanceOf('\chilimatic\lib\Interfaces\IFlyWeightTransformer', $transformer);
    }

    /**
     * @test
     */
    public function checkInvokeTransformerWithArray()
    {
        $transformer = new DateDiffToDecimalTime();

        $string = $transformer(['12']);

        self::assertEquals(0, $string);
    }

    /**
     * @test
     */
    public function checkTransformerDateInterval()
    {
        $transformer = new DateDiffToDecimalTime();

        $dateInterval = (new \DateTime('now'))->diff(new \DateTime('-1 day'));

        $string = $transformer->transform($dateInterval);

        self::assertEquals(1440, $string);
    }
}