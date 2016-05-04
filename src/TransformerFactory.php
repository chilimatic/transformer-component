<?php
namespace chilimatic\lib\Transformer;


use chilimatic\lib\Interfaces\IFactoryOptions;
use chilimatic\lib\Interfaces\IFlyWeightTransformer;
use chilimatic\lib\Transformer\String\PrependNamespace;

class TransformerFactory implements IFactoryOptions
{
    const NAMESPACE_TRANSFORMER = 'PrependNamespace';

    /**
     * @var []IFlyWeightTransformer
     */
    private $objTemplates;

    /**
     * @var PrependNamespace
     */
    private $namespaceTransformer;


    /**
     * the name is expected to prepend the subnamespace "string" or "time" or something similar
     * -> otherwise a config based mapping would be required
     *
     * @param string $name
     * @param array $options
     * @return IFlyWeightTransformer|null
     */
    public function make($name, $options)
    {
        if (!$name || !is_string($name)) {
            return null;
        }

        if (isset($this->objTemplates[$name])) {
            return clone $this->objTemplates[$name];
        }

        if (!$this->namespaceTransformer) {
            $this->namespaceTransformer = $this->objTemplates[self::NAMESPACE_TRANSFORMER] = new PrependNamespace();
        }

        $className = $this->namespaceTransformer->transform($name, ['namespace' => __NAMESPACE__]);

        if (!class_exists($className, true)) {
            return null;
        }

        $this->objTemplates[$name] = new $className();

        return clone $this->objTemplates[$name];
    }

    /**
     * @param string $name
     * @param array $options
     *
     * @return IFlyWeightTransformer|null
     */
    public function __invoke($name, $options)
    {
        return $this->make($name, $options);
    }
}