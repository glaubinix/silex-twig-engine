<?php

namespace Glaubinix\TwigEngine;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Bridge\Twig\TwigEngine;
use Symfony\Component\Templating\TemplateNameParser;

class TwigEngineServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $app['glaubinix.twig_engine.template_name_parser'] = $app->share(function () {
            return new TemplateNameParser();
        });

        $app['templating'] = $app->share(function (Application $app) {
            return new TwigEngine($app['twig'], $app['glaubinix.twig_engine.template_name_parser']);
        });
    }

    /**
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function boot(Application $app)
    {
    }
}
