<?php

namespace Codememory\Components\Attributes\Targets;

use JetBrains\PhpStorm\Pure;
use ReflectionAttribute;
use ReflectionProperty;

/**
 * Class MethodTarget
 *
 * @package Codememory\Components\Attributes\Targets
 *
 * @author  Codememory
 */
final class PropertyTarget extends AbstractTargetForComponents
{

    /**
     * @see getAttributes()
     */
    #[Pure]
    public function getAttributes(ReflectionProperty $property): array
    {

        return $this->componentGetAttributes($property);

    }

    /**
     * @see getAttributeIfExist()
     */
    public function getAttributeIfExist(string $name, ReflectionProperty $property): bool|ReflectionAttribute
    {

        return $this->componentGetAttributeIfExist($name, $property);

    }

    /**
     * @see getPropertiesIfAttributesExist()
     */
    public function getPropertiesIfAttributesExist(array|string $names, array $properties = []): array
    {

        return $this->getComponentsIfAttributeExist(
            $names,
            $this->components($this->assistant->getProperties(), $properties)
        );

    }

    /**
     * @see getComponentsByAttributeWithArguments()
     */
    public function getPropertiesByAttributeWithArguments(string $attributeName, array $arguments, array $properties = []): array
    {

        return $this->getComponentsByAttributeWithArguments(
            $attributeName,
            $arguments,
            $this->components($this->assistant->getProperties(), $properties)
        );

    }

    /**
     * @see getAttributesByComponentName()
     */
    public function getAttributesByPropertyName(string $name, array $properties = []): bool|array
    {

        return $this->getAttributesByComponentName(
            $name,
            $this->components($this->assistant->getProperties(), $properties)
        );

    }

}