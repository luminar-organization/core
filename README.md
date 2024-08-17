# Luminar core
![Tests Status](https://img.shields.io/github/actions/workflow/status/luminar-organization/core/tests.yml?label=Tests)

**Luminar Core** is the foundational package for the Luminar PHP framework, providing the providing essential functionality and core components needed to build applications.

# Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

# Introduction

Luminar Core is a PHP library that includes the core components of the Luminar framework. This package provides the service container, configuration management, event dispatching, and utility functions.

## Features

- **Service Container**: A powerful dependency injection container
- **Configuration Management**: Load and manage configuration files in YAML format.
- **Event Dispatching**: A flexible event system for handling application events.
- **Utility Functions**: Helpful functions for string manipulation and general utilities.

# Installation

You can install Luminar Core using Composer, Run the following command in your project directory:

```shell
composer require luminar-organization/core
```

# Usage

### Service Container
Bind and resolve services using the `Container` class:

```php
use Luminar\Core\Container\Container;

$container = new Container();

$container->bind('example', function() {
    return new \SomeClass();
});

$instance = $container->resolve('example');
```

### Configuration Management
Load configuration files and retrieve values:

```php
use Luminar\Core\Config\Config;

$config = new Config('/path/to/config');

$value = $config->get('database.host', 'localhost');
```

### Event Dispatching
Register and dispatch events using the `EventDispatcher` class:

```php
use Luminar\Core\Events\EventDispatcher;

$dispatcher = new EventDispatcher();

$dispatcher->listen('event.name', function($data) {
    // Handle the event
});

$dispatcher->dispatch('event.name', $data);
```

### Utility Functions
Use helper and string utility functions:

```php
use Luminar\Core\Support\Helpers;
use Luminar\Core\Support\Str;

$emailValid = Helpers::isValidEmail('test@example.com'); // Output will be boolean
$randomStr = Helpers::randomString(12); // Output will be random string length of 12 characters
$humanizedStr = Helpers::humanize('hello_world'); // Output will be Hello World

$snakeCase = Str::snakeCase('HelloWorld'); // Output will be hello_world
$camelCase = Str::camelCase('hello_world'); // Output will be helloWorld
$titleCase = Str::titleCase('hello world'); // Output will be Hello World

```

## Testing
To run the tests, ensure you have installed all development requirements:
```shell
composer install
```
After that run all tests:
```shell
composer run test
```

This will execute all tests located in the `tests/` directory and provide feedback on the test results.

## Contributing

We welcome contributions to Luminar Core! Please follow these steps to contribute:
- Fork the repository
- Create a new branch for your feature or bugfix
- Make your changes and add tests if applicable
- Submit a pull request with a clear description of your changes

Please refer to the [CONTRIBUTING.md](CONTRIBUTING.md) file for more details

## License
Luminar Core is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information

---

For more information about Luminar, visit our [website](https://luminar.github.io/) or check out our [documentation](https://luminar-docs.github.io)