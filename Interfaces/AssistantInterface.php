<?php

namespace Codememory\Components\Attributes\Interfaces;

use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

/**
 * Interface AssistantInterface
 *
 * @package Codememory\Components\Attributes\Interfaces
 *
 * @author  Codememory
 */
interface AssistantInterface
{

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Establish pursued object
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @param string|object $pursued
     *
     * @return AssistantInterface
     */
    public function setPursued(string|object $pursued): AssistantInterface;

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get the namespace of the victim
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @return string
     */
    public function getPursued(): string;

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get an pursued reflector
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @return ReflectionClass
     */
    public function getReflector(): ReflectionClass;

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get an array of properties of the pursued
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @return ReflectionProperty[]
     */
    public function getProperties(): array;

    /**
     * =>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>=>
     * Get an array of methods of the pursued
     * <=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=<=
     *
     * @return ReflectionMethod[]
     */
    public function getMethods(): array;

}