<?php

define('DIRETORIO_SISTEMA', realpath(__DIR__));

define('DIRETORIO_AUTOLOAD', DIRETORIO_SISTEMA . '/lib');

/**
 * Auto load de classes
 *
 * @link https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md
 * @param type $className
 */
function __autoload($className) {
    $className = ltrim($className, '\\');
    $fileName = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require DIRETORIO_AUTOLOAD . '/' . $fileName;
}