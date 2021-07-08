<?php

namespace Codememory\Components\Attributes\Interfaces;

use ReflectionAttribute;

/**
 * Interface TargetInterface
 *
 * @package Codememory\Components\Attributes\Interfaces
 *
 * @author  Codememory
 */
interface TargetInterface
{

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Check for existence of an attribute by name in an array of attributes
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param string|array $names
     * @param array        $attributes
     *
     * @return bool
     */
    public function existAttribute(string|array $names, array $attributes): bool;

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Check for the existence of arguments and values in an attribute
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param array               $arguments
     * @param ReflectionAttribute $attribute
     *
     * @return bool
     */
    public function existArgumentsInAttribute(array $arguments, ReflectionAttribute $attribute): bool;

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get Attribute Arguments
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param ReflectionAttribute $attribute
     *
     * @return array
     */
    public function getAttributeArguments(ReflectionAttribute $attribute): array;

}