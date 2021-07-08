<?php

namespace Codememory\Components\Attributes\Targets;

use ReflectionAttribute;

/**
 * Class ClassTarget
 *
 * @package Codememory\Components\Attributes\Assistants
 *
 * @author  Codememory
 */
final class ClassTarget extends AbstractTarget
{

    /**
     * @return array
     */
    public function getAttributes(): array
    {

        return $this->assistant->getReflector()->getAttributes();

    }

    /**
     * @param string $name
     *
     * @return bool|ReflectionAttribute
     */
    public function getAttributeIfExist(string $name): bool|ReflectionAttribute
    {

        foreach ($this->getAttributes() as $attribute) {
            if ($attribute->getName() === $name) {
                return $attribute;
            }
        }

        return false;

    }

}