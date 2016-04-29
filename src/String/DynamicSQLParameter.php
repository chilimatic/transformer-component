<?php
/**
 *
 * @author j
 * Date: 9/14/15
 * Time: 11:40 PM
 *
 * File: DynamicSQLParameter.php
 */

namespace chilimatic\lib\Transformer\String;

use chilimatic\lib\Interfaces\IFlyWeightTransformer;


/**
 * Class DynamicSQLParameter
 *
 * transforms a key to an md5 representation to be bound in an PDO statement
 *
 * @package chilimatic\lib\Transformer\String
 */
class DynamicSQLParameter implements IFlyWeightTransformer
{
    /**
     * since most Parsers
     *
     * @var string
     */
    const TRANSFORM_PREFIX = ':P';


    /**
     * @param string $content
     * @param array $options
     *
     * @return string
     */
    public function __invoke($content, $options = []) {
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

        return self::TRANSFORM_PREFIX . md5((string) $content);
    }
}