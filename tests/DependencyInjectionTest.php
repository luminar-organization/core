<?php

namespace Luminar\Core\Tests;

use Luminar\Core\Container\Container;
use Luminar\Core\Container\DependencyInjection;
use Luminar\Core\Exceptions\ConfigException;
use Luminar\Core\Exceptions\DependencyInjectionException;
use PHPUnit\Framework\TestCase;
use ReflectionException;


class DependencyInjectionTest extends TestCase
{
    protected Container $container;
    protected DependencyInjection $di;

    protected function setUp(): void
    {
        parent::setUp();
        $this->container = new Container();
        $this->di = new DependencyInjection($this->container);
    }

    /**
     * @return void
     * @throws DependencyInjectionException
     * @throws ReflectionException
     */
    public function testCanInstantiateSimpleClass()
    {
        // Assuming `SimpleClass` has a no-argument constructor
        $this->container->bind('SimpleClass', "\\Luminar\\Core\\Tests\\SimpleClass");

        $instance = $this->di->build("\\Luminar\\Core\\Tests\\SimpleClass");

        $this->assertInstanceOf("\\Luminar\\Core\\Tests\\SimpleClass", $instance);
    }

    /**
     * @return void
     * @throws DependencyInjectionException
     * @throws ReflectionException
     */
    public function testCanInjectDependencies()
    {
        $this->container->bind('Luminar\Core\Tests\DependencyClass', "Luminar\Core\Tests\DependencyClass");

        $instance = $this->di->build("\\Luminar\\Core\\Tests\\DependentClass");

        $this->assertInstanceOf('\Luminar\Core\Tests\DependentClass', $instance);
        $this->assertInstanceOf('\Luminar\Core\Tests\DependencyClass', $instance->getDependency());
    }

}