<?php

namespace Glaubinix\TwigEngine;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Component\Templating\TemplateNameParser;

class TwigEngineServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $pimple
     */
    public function register(Container $pimple)
    {
        $pimple['glaubinix.twig_engine.template_name_parser'] = function () {
            return new TemplateNameParser();
        };

        $pimple['templating'] = function (Container $pimple) {
            return new TwigEngine($pimple['twig'], $pimple['glaubinix.twig_engine.template_name_parser']);
        };
    }
}
