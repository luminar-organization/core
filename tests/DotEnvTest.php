<?php

namespace Luminar\Core\Tests;

use Luminar\Core\DotEnv\Loader;
use Luminar\Core\Exceptions\DotEnvException;
use PHPUnit\Framework\TestCase;

class DotEnvTest extends TestCase
{
    public function testLoader()
    {
        $loader = new Loader(__DIR__ . '/fixtures/.env');
        $loader->load();
        $this->assertNotEquals([], $_ENV);
        $this->assertEquals("VALUE", $_ENV["EXAMPLE"]);
    }

    public function testLoaderException()
    {
        $this->expectException(DotEnvException::class);
        $loader = new Loader(__DIR__ . '/.env');
        $loader->load();
    }
}