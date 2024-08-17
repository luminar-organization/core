<?php

use Luminar\Core\Support\Str;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testSnakeCase(): void
    {
        $this->assertEquals('hello_world', Str::snakeCase('HelloWorld'));
    }

    public function testCamelCase(): void
    {
        $this->assertEquals('helloWorld', Str::camelCase('hello_world'));
    }

    public function testTitleCase(): void
    {
        $this->assertEquals('Hello World', Str::titleCase('hello world'));
    }
}