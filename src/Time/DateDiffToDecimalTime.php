<?php
namespace chilimatic\lib\Transformer\Time;

use chilimatic\lib\Interfaces\IFlyWeightTransformer;

/**
 * Class ISOTimeToDecimalTime
 *
 * @package chilimatic\lib\transformer\time
 */
class DateDiffToDecimalTime implements IFlyWeightTransformer
{

    /**
     * calculates the time down to the minutes
     *
     * @param \DateInterval $content
     * @param array $options
     *
     * @return string
     */
    public function transform($content, $options = [])
    {
        if (!$content instanceof \DateInterval) {
            return 0;
        }

        $decTime = 0;
        $decTime += ($content->d ? $content->d * 60 * 24 : 0);
        $decTime += ($content->h ? $content->h * 60 : 0);
        $decTime += $content->i;
        $decTime += ($content->s ? $content->s / 60 : 0);

        return $decTime;
    }

    /**
     * @param \DateInterval $content
     * @param array $options
     *
     * @return string
     */
    public function __invoke($content, $options = [])
    {
        return $this->transform($content, $options);
    }
}