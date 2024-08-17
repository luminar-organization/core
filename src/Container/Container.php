<?php

namespace Luminar\Core\Container;

use Exception;

class Container
{
    /**
     * @var array $blendings
     */
    protected array $bindings = [];

    /**
     * @var array $instances
     */
    protected array $instances = [];

    /**
     * @param  string $abstract
     * @param  $concrete
     * @return void
     */
    public function bind(string $abstract, $concrete): void
    {
        $this->bindings[$abstract] = $concrete;
    }

    /**
     * @param  string $abstract
     * @param  $concrete
     * @return void
     */
    public function singleton(string $abstract, $concrete): void
    {
        $this->bind($abstract, $concrete);
        $this->instances[$abstract] = null;
    }

    /**
     * @param  string $abstract
     * @return mixed
     * @throws Exception
     */
    public function resolve(string $abstract): mixed
    {
        if(isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        $concrete = $this->bindings[$abstract] ?? null;

        if(is_callable($concrete)) {
            $object = $concrete($this);
        } elseif(is_string($concrete)) {
            $object = new $concrete;
        } else {
            throw new Exception("Service [$abstract] not found ini the container.");
        }

        if(array_key_exists($abstract, $this->instances)) {
            $this->instances[$abstract] = $object;
        }

        return $object;
    }
}
