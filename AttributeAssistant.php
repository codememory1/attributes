<?php

namespace Codememory\Components\Attributes;

use Codememory\Components\Attributes\Interfaces\AssistantInterface;
use JetBrains\PhpStorm\Pure;
use ReflectionClass;
use ReflectionException;

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
     * @var ReflectionClass
     */
    private ReflectionClass $reflector;

    /**
     * @var string
     */
    private string $pursued;

    /**
     * AttributeAssistant constructor.
     *
     * @param string|object $pursued
     *
     * @throws ReflectionException
     */
    public function __construct(string|object $pursued)
    {

        $this->reflector = new ReflectionClass($pursued);
        $this->pursued = $this->reflector->getName();

    }

    /**
     * @inheritDoc
     */
    public function getReflector(): ReflectionClass
    {

        return $this->reflector;

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
    #[Pure]
    public function getProperties(): array
    {

        return $this->reflector->getProperties();

    }

    /**
     * @inheritDoc
     */
    #[Pure]
    public function getMethods(): array
    {

        return $this->reflector->getMethods();

    }

}