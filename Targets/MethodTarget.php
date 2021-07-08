<?php

namespace Codememory\Components\Attributes\Targets;

use JetBrains\PhpStorm\Pure;
use ReflectionAttribute;
use ReflectionMethod;

/**
 * Class MethodTarget
 *
 * @package Codememory\Components\Attributes\Targets
 *
 * @author  Codememory
 */
final class MethodTarget extends AbstractTargetForComponents
{

    /**
     * @see getAttributes()
     */
    #[Pure]
    public function getAttributes(ReflectionMethod $method): array
    {

        return $this->componentGetAttributes($method);

    }

    /**
     * @see getAttributeIfExist()
     */
    public function getAttributeIfExist(string $name, ReflectionMethod $method): bool|ReflectionAttribute
    {

        return $this->componentGetAttributeIfExist($name, $method);

    }

    /**
     * @see getComponentsIfAttributeExist()
     */
    public function getMethodsIfAttributesExist(array|string $names, array $methods = []): array
    {

        return $this->getComponentsIfAttributeExist(
            $names,
            $this->components($this->assistant->getMethods(), $methods)
        );

    }

    /**
     * @see getComponentsByAttributeWithArguments()
     */
    public function getMethodsByAttributeWithArguments(string $attributeName, array $arguments, array $methods = []): array
    {

        return $this->getComponentsByAttributeWithArguments(
            $attributeName,
            $arguments,
            $this->components($this->assistant->getMethods(), $methods)
        );

    }

    /**
     * @see getAttributesByMethodName()
     */
    public function getAttributesByMethodName(string $name, array $methods = []): bool|array
    {

        return $this->getAttributesByComponentName(
            $name,
            $this->components($this->assistant->getMethods(), $methods)
        );

    }

}