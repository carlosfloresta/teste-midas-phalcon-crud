<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    array(
       $config->application->controllersDir,
        $config->application->modelsDir,
    )

);

$loader->registerNamespaces(
    [
       'App\Forms'  => APP_PATH .'/app/forms/',
    ]
);

$loader->register();