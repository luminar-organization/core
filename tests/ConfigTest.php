<?php

use Luminar\Core\Config\Config;
use Luminar\Core\Exceptions\ConfigException;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * @var string $validPath
     */
    private string $validPath;

    /**
     * @var string $invalidPath
     */
    private string $invalidPath;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->validPath = __DIR__ . '/fixtures';
        $this->invalidPath = __DIR__ . '/invalid-path';

        file_put_contents($this->validPath . '/valid-config.yaml',
            "database:\n    host: localhost\n    port: 3306\n"
        );
    }

    /**
     * @return void
     * @throws ConfigException
     */
    public function testLoadValidConfig(): void
    {
        $config = new Config($this->validPath);

        $this->assertEquals('localhost', $config->get('database.host'));
        $this->assertEquals(3306, $config->get('database.port'));
    }

    /**
     * @return void
     * @throws ConfigException
     */
    public function testLoadInvalidConfigPath(): void
    {
        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage("Configuration directory does not exist: " . $this->invalidPath);

        new Config($this->invalidPath);
    }

    /**
     * @return void
     * @throws ConfigException
     */
    public function testLoadInvalidConfigFile(): void
    {
        $invalidFilePath = $this->validPath . '/invalid-config.yaml';
        file_put_contents($invalidFilePath, "invalid yaml");

        $this->expectException(ConfigException::class);
        $this->expectExceptionMessage("Configuration file is not readable: $invalidFilePath");

        new Config($this->validPath);
        @unlink($this->validPath . '/invalid-config.yaml');
    }

    /**
     * @return void
     * @throws ConfigException
     */
    public function testGetWithDefaultValue(): void
    {
        $config = new Config($this->validPath);

        $this->assertEquals('default_value', $config->get('nonexistent.key', 'default_value'));
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        @unlink($this->validPath . '/valid-config.yaml');
        @unlink($this->validPath . '/invalid-config.yaml');
    }
}