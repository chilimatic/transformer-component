<?php

namespace chilimatic\lib\Transformer\String;
use chilimatic\lib\Interfaces\IFlyWeightTransformer;

/**
 * Class UnderScoreToCamelCase
 * @package chilimatic\framework\transformer\string
 */
class UnderScoreToCamelCase implements IFlyWeightTransformer
{
    /**
     * @param string $content
     * @param array $options
     * @return string
     */
    public function transform($content, $options = [])
    {
        if (!is_string($content)) {
            return $content;
        }

        if (strpos($content, '_') === false) {
            return $content;
        }

        $tmp = explode('_', $content);

        $firstChar = $content[0]{0};

        $tmp = array_map(function($element){
            return ucfirst($element);
        }, $tmp);

        // return the first character to the original Case
        $result = implode('', (array) $tmp);
        $result{0} = $firstChar;

        return (string) $result;
    }

    /**
     * @param string $content
     * @param array $options
     * @return string
     */
    public function __invoke($content, $options = [])
    {
        return $this->transform($content, $options);
    }
}