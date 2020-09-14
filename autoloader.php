<?php
spl_autoload_register('autoload');

function autoload($className)
{
    $path = 'controllers/' . $className . '.php';
    include $path;

    if (!file_exists($path)) {
        return $path . ' not found';
    }
}
