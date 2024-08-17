<?php

namespace Luminar\Core\Config;

use Luminar\Core\Exceptions\ConfigException;

class Config
{
    /**
     * @var array $configurations
     */
    protected array $configurations = [];

    /**
     * @param  string $path
     * @throws ConfigException
     */
    public function __construct(string $path)
    {
        $this->load($path);
    }

    /**
     * @param  string $path
     * @return void
     * @throws ConfigException
     */
    private function load(string $path): void
    {
        if(!is_dir($path)) {
            throw new ConfigException("Configuration directory does not exist: $path");
        }

        $files = glob($path . "/*.yaml");

        foreach($files as $file) {
            $this->configurations = array_merge($this->configurations, $this->loadFile($file));
        }
    }

    /**
     * @param  string $file
     * @return mixed
     * @throws ConfigException
     */
    private function loadFile(string $file): mixed
    {

        $response = yaml_parse_file($file);
        if($response === false or gettype($response) === 'string') {
            throw new ConfigException("Configuration file is not readable: $file");
        }

        return $response;
    }

    /**
     * @param  string     $key
     * @param  mixed|null $default
     * @return array|mixed|null
     */
    public function get(string $key, mixed $default = null): mixed
    {
        $keys = explode('.', $key);
        $value = $this->configurations;

        foreach($keys as $k) {
            if(isset($value[$k])) {
                $value = $value[$k];
            } else {
                return $default;
            }
        }

        return $value;
    }
}
