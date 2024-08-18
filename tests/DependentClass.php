<?php

namespace Luminar\Core\Tests;

class DependentClass
{
    protected DependencyClass $dependency;

    public function __construct(DependencyClass $dependency)
    {
        $this->dependency = $dependency;
    }

    public function getDependency(): DependencyClass
    {
        return $this->dependency;
    }
}