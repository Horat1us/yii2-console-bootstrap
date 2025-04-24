# Yii2 Console Bootstrap
[![Test & Lint](https://github.com/Horat1us/yii2-console-bootstrap/actions/workflows/php.yml/badge.svg?branch=master)](https://github.com/Horat1us/yii2-console-bootstrap/actions/workflows/php.yml)

This package implements bootstrap to allow automatically attaching console controllers to Yii2 Console Applications.

## Installation

```php
composer require horat1us/yii2-console-bootstrap:^1.0
```

## Usage

```php
<?php

use Horat1us\Yii\Console\Bootstrap;

class YourBootstrap extends Bootstrap
{
    public bool $allowOverride = true; // default false
    public array $controllerMap = [
        'route' => [
            'class' => YourController::class,
        ]
    ];
}

```

## License
[MIT](./LICENSE)
