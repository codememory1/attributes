<?php

namespace Codememory\Components\Attributes\Targets;

use Codememory\Components\Attributes\Interfaces\AssistantInterface;
use Codememory\Components\Attributes\Interfaces\TargetInterface;
use JetBrains\PhpStorm\Pure;
use ReflectionAttribute;

/**
 * Class AbstractTarget
 *
 * @package Codememory\Components\Attributes\Targets
 *
 * @author  Codememory
 */
abstract class AbstractTarget implements TargetInterface
{

    /**
     * @var AssistantInterface
     */
    protected AssistantInterface $assistant;

    /**
     * AbstractTarget constructor.
     *
     * @param AssistantInterface $assistant
     */
    public function __construct(AssistantInterface $assistant)
    {

        $this->assistant = $assistant;

    }

    /**
     * @inheritDoc
     */
    public function existAttribute(string|array $names, array $attributes): bool
    {

        $names = is_string($names) ? [$names] : $names;
        $attributeNames = [];

        foreach ($attributes as $attribute) {
            $attributeNames[] = $attribute->getName();
        }

        if (count(array_intersect($attributeNames, $names)) === count($names)) {
            return true;
        }

        return false;

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function existArgumentsInAttribute(array $arguments, ReflectionAttribute $attribute): bool
    {

        $attributeArguments = $attribute->getArguments();

        return count(array_intersect_assoc($attributeArguments, $arguments)) === count($arguments);

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getAttributeArguments(ReflectionAttribute $attribute): array
    {

        return $attribute->getArguments();

    }

}