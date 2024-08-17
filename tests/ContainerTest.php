<?php

use Luminar\Core\Container\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    protected Container $container;

    protected function setUp(): void
    {
        parent::setUp();
        $this->container = new Container();
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testBindAndResolve()
    {
        $this->container->bind('foo', function () {
           return 'bar';
        });

        $result = $this->container->resolve('foo');
        $this->assertEquals('bar', $result);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testSingleton()
    {
        $this->container->singleton('singleton', function () {
            return new stdClass();
        });

        $instance1 = $this->container->resolve('singleton');
        $instance2 = $this->container->resolve('singleton');

        $this->assertSame($instance1, $instance2);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testResolveException()
    {
        $this->expectException(Exception::class);
        $this->container->resolve('none_existent');
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testBindingStringClass()
    {
        $this->container->bind("myClass", stdclass::class);

        $result = $this->container->resolve('myClass');
        $this->assertInstanceOf(stdclass::class, $result);
    }

    /**
     * @return void
     * @throws Exception
     */
    public function testSingletonBinding()
    {
        $this->container->singleton("myClass", stdClass::class);

        $result1 = $this->container->resolve("myClass");
        $result2 = $this->container->resolve("myClass");

        $this->assertSame($result1, $result2);
    }
}