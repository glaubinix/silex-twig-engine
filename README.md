silex-twig-engine
=================
There are a couple of symfony components out there which depend on the EngineInterface rather then depending on a specific template engine.
This allows users with a different template engine to use the features too -> YaY

Installation
------------
The easiest way to install this library is to use [Composer](http://getcomposer.org/).
Add the package "glaubinix/silex-twig-engine" to your composer.json.

```json
{
    "require": {
        "glaubinix/silex-twig-engine": "@stable"
    }
}
```

Usage
-----
````php
// Register the twig service provider
$app->register(new \Silex\Provider\TwigServiceProvider(),
    [
    // your twig config
    ]
);

// Register the twig service provider
$app->register(new \Glaubinix\TwigEngine\TwigEngineServiceProvider());

// The engine is now available under the same identifier as in symfony
$app['templating']->render('template', []);
````

License
-------
MIT
