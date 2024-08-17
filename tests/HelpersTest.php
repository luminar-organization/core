<?php

use Luminar\Core\Support\Helpers;
use PHPUnit\Framework\TestCase;
use Random\RandomException;

class HelpersTest extends TestCase
{
    /**
     * @return void
     */
    public function testIsValidEmail(): void
    {
        $this->assertTrue(Helpers::isValidEmail('test@example.com'));
        $this->assertFalse(Helpers::isValidEmail('invalid-email'));
    }

    /**
     * @return void
     * @throws RandomException
     */
    public function testRandomString(): void
    {
        $randomString = Helpers::randomString(16);
        $this->assertEquals(16, strlen($randomString));
    }

    /**
     * @return void
     */
    public function testHumanize(): void
    {
        $this->assertEquals('Hello World', Helpers::humanize('hello_world'));
    }
}