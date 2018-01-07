<?php

namespace Glaubinix\Tests\TwigEngine;

use Glaubinix\TwigEngine\TwigEngineServiceProvider;
use PHPUnit\Framework\TestCase;
use Pimple\Container;
use Silex\Provider\TwigServiceProvider;
use Symfony\Bridge\Twig\TwigEngine;

class TwigEngineServiceProviderTest extends TestCase
{
    public function testCreateTemplating()
    {
        $pimple = new Container([
            'debug' => false,
            'charset' => '',
        ]);
        $pimple->register(new TwigEngineServiceProvider());
        $pimple->register(new TwigServiceProvider());

        $this->assertInstanceOf(TwigEngine::class, $pimple['templating']);
    }
}
