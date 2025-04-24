<?php

declare(strict_types=1);

namespace Horat1us\Yii\Console\Tests;

use Horat1us\Yii\Console\Bootstrap;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use yii\console;
use yii\base;

#[CoversClass(Bootstrap::class)]
class BootstrapTest extends TestCase
{
    public function testOverride(): void
    {
        $app = $this->createMock(console\Application::class);
        $app->controllerMap = [
            'foo' => 'bar',
            'bar' => 'foo',
        ];
        $bootstrap = new Bootstrap();
        $bootstrap->allowOverride = true;
        $bootstrap->controllerMap = [
            'foo' => 'foo',
        ];
        $bootstrap->bootstrap($app);
        $this->assertEquals([
            'foo' => 'foo',
            'bar' => 'foo',
        ], $app->controllerMap);
    }

    public function testNoOverride(): void
    {
        $app = $this->createMock(console\Application::class);
        $app->controllerMap = [
            'foo' => 'bar',
            'bar' => 'foo',
        ];
        $bootstrap = new Bootstrap();
        $bootstrap->allowOverride = false;
        $bootstrap->controllerMap = [
            'foo' => 'foo',
        ];
        $bootstrap->bootstrap($app);
        $this->assertEquals([
            'foo' => 'bar',
            'bar' => 'foo',
        ], $app->controllerMap);
    }

    public function testNonConsoleAppliocation(): void
    {
        $app = $this->createMock(base\Application::class);
        $app->controllerMap = [
            'foo' => 'bar',
        ];
        $bootstrap = new Bootstrap();
        $bootstrap->allowOverride = true;
        $bootstrap->controllerMap = [
            'foo' => 'foo',
        ];
        $bootstrap->bootstrap($app);
        $this->assertEquals([
            'foo' => 'bar'
        ], $app->controllerMap);
    }
}
