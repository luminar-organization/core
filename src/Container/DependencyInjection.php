<?php

namespace Luminar\Core\Container;

use Luminar\Core\Exceptions\DependencyInjectionException;
use ReflectionClass;
use ReflectionException;

class DependencyInjection
{
    /**
     * The container instance.
     *
     * @var Container
     */
    protected Container $container;

    /**
     * Create a new DependencyInjection instance.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Build a new instance of a class, resolving its dependencies.
     *
     * @param string $concrete
     * @return object
     * @throws ReflectionException
     * @throws DependencyInjectionException
     */
    public function build(string $concrete)
    {
        $reflector = new ReflectionClass($concrete);

        if (!$reflector->isInstantiable()) {
            throw new DependencyInjectionException("Cannot instantiate [$concrete].");
        }

        $constructor = $reflector->getConstructor();

        if (is_null($constructor)) {
            return new $concrete;
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependency = $parameter->getClass();

            if ($dependency === null) {
                throw new DependencyInjectionException("Cannot resolve parameter [{$parameter->name}] in [$concrete].");
            }

            var_dump($dependency->name);
            $dependencies[] = $this->container->resolve($dependency->name);
        }

        return $reflector->newInstanceArgs($dependencies);
    }
}