<?php

namespace Codememory\Components\Attributes\Targets;

use JetBrains\PhpStorm\Pure;
use ReflectionAttribute;
use ReflectionMethod;
use ReflectionProperty;

/**
 * Class TargetForConstructionTrait
 *
 * @package Codememory\Components\Attributes\Targets
 *
 * @author  Codememory
 */
abstract class AbstractTargetForComponents extends AbstractTarget
{

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Returns an array of components if custom is passed and returns
     * otherwise an array of general components
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param array $general
     * @param array $custom
     *
     * @return array
     */
    protected function components(array $general, array $custom = []): array
    {

        return [] === $custom ? $general : $custom;

    }

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get component attributes
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param ReflectionProperty|ReflectionMethod $components
     *
     * @return array
     */
    #[Pure]
    protected function componentGetAttributes(ReflectionProperty|ReflectionMethod $components): array
    {

        return $components->getAttributes();

    }

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get component attribute if it exists, otherwise it will return false
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param string                              $name
     * @param ReflectionProperty|ReflectionMethod $components
     *
     * @return bool|ReflectionAttribute
     */
    protected function componentGetAttributeIfExist(string $name, ReflectionProperty|ReflectionMethod $components): bool|ReflectionAttribute
    {

        $attributes = $this->componentGetAttributes($components);

        foreach ($attributes as $attribute) {
            if ($attribute->getName() === $name) {
                return $attribute;
            }
        }

        return false;

    }

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get components in which certain attributes exist
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param array|string $names
     * @param array        $components
     *
     * @return array
     */
    protected function getComponentsIfAttributeExist(array|string $names, array $components): array
    {

        $names = is_string($names) ? [$names] : $names;
        $foundConstructions = [];

        foreach ($components as $component) {
            $attributes = $this->componentGetAttributes($component);

            if ($this->existAttribute($names, $attributes)) {
                $foundConstructions[] = $component;
            }
        }

        return $foundConstructions;

    }

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get components in which certain attributes exist and match the
     * attribute arguments to a given argument array passed
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param string $attributeName
     * @param array  $arguments
     * @param array  $components
     *
     * @return array
     */
    protected function getComponentsByAttributeWithArguments(string $attributeName, array $arguments, array $components = []): array
    {

        $foundConstructions = [];

        foreach ($components as $component) {
            $attribute = $this->componentGetAttributeIfExist($attributeName, $component);

            if (false !== $attribute && $this->existArgumentsInAttribute($arguments, $attribute)) {
                $foundConstructions[] = $component;
            }
        }

        return $foundConstructions;

    }

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get attributes by component name, if component does not exist will return false
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param string $name
     * @param array  $components
     *
     * @return bool|array
     */
    protected function getAttributesByComponentName(string $name, array $components): bool|array
    {

        foreach ($components as $component) {
            if ($component->getName() === $name) {
                return $component->getAttributes();
            }
        }

        return false;

    }

}