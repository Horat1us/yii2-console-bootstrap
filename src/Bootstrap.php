<?php

declare(strict_types=1);

namespace Horat1us\Yii\Console;

use yii\console;
use yii\base;

class Bootstrap extends base\BaseObject implements base\BootstrapInterface
{
    public bool $allowOverride = false;
    public array $controllerMap = [];

    public function bootstrap($app): void
    {
        if (!$app instanceof console\Application) {
            return;
        }

        foreach ($this->controllerMap as $route => $config) {
            if (!$this->allowOverride && array_key_exists($route, $app->controllerMap)) {
                continue;
            }
            $app->controllerMap[$route] = $config;
        }

        $app->controllerMap = array_merge($this->controllerMap, $app->controllerMap);
    }
}
