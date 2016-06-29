<?php
namespace chilimatic\lib\Transformer\String;

use chilimatic\lib\Interfaces\IFlyWeightTransformer;

/**
 * Class ValidatorNameSpaceClassName
 *
 * @package chilimatic\lib\Transformer\String
 */
class AnnotationValidatorClassName implements IFlyWeightTransformer
{
    /**
     * @var string
     */
    const NAMESPACE_DELIMITER = '\\';

    /**
     * @param string $content
     * @param array $options
     *
     * @return string
     */
    public function __invoke($content, $options = [])
    {
        return $this->transform($content);
    }

    /**
     * @param string $content
     * @param array $options
     *
     * @return string
     */
    public function transform($content, $options = [])
    {
        if (!$content || !is_string($content)) {
            return $content;
        }

        // if there is no namespace we assume the first letter is uppercase
        if (strpos($content, self::NAMESPACE_DELIMITER) === false) {
            return ucfirst($content);
        }

        // get the last character after the last backslash and set it to uppercase
        if (($pos = (int) strrpos($content, self::NAMESPACE_DELIMITER)) !== false) {
            $content[$pos+1] = ucfirst($content[$pos+1]);
        }

        return $content;
    }

}