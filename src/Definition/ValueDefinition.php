<?php

declare(strict_types=1);

namespace DI\Definition;

use Psr\Container\ContainerInterface;

/**
 * Definition of a value for dependency injection.
 *
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class ValueDefinition implements Definition, SelfResolvingDefinition
{
    /**
     * Entry name.
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @param string $name Entry name
     * @param mixed $value
     */
    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function resolve(ContainerInterface $container)
    {
        return $this->getValue();
    }

    public function isResolvable(ContainerInterface $container) : bool
    {
        return true;
    }

    public function __toString()
    {
        return sprintf('Value (%s)', var_export($this->value, true));
    }
}
