<?php

namespace Codememory\Components\Attributes;

use Codememory\Components\Attributes\Interfaces\AssistantInterface;
use ReflectionClass;
use ReflectionException;
use RuntimeException;

/**
 * Class AttributeAssistant
 *
 * @package Codememory\Components\Attributes
 *
 * @author  Codememory
 */
class AttributeAssistant implements AssistantInterface
{

    /**
     * @var ReflectionClass|null
     */
    private ?ReflectionClass $reflector = null;

    /**
     * @var string|null
     */
    private ?string $pursued = null;

    /**
     * @inheritDoc
     * @throws ReflectionException
     */
    public function setPursued(object|string $pursued): AssistantInterface
    {

        $this->reflector = new ReflectionClass($pursued);
        $this->pursued = $this->reflector->getName();

        return $this;

    }

    /**
     * @inheritDoc
     */
    public function getPursued(): string
    {

        return $this->pursued;

    }

    /**
     * @inheritDoc
     */
    public function getReflector(): ReflectionClass
    {

        if (null === $this->reflector) {
            throw new RuntimeException('It is impossible to get a reflector because the pursued object is not installed');
        }

        return $this->reflector;

    }

    /**
     * @inheritDoc
     */
    public function getProperties(): array
    {

        return $this->getReflector()->getProperties();

    }

    /**
     * @inheritDoc
     */
    public function getMethods(): array
    {

        return $this->getReflector()->getMethods();

    }

}