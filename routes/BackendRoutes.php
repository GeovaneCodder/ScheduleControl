<?php

declare(strict_types=1);

/**
 * Load all route files from "Routes" directory
 */

$routeFiles = glob(__DIR__ . DIRECTORY_SEPARATOR . 'Routes' . DIRECTORY_SEPARATOR . '*.php');

foreach ($routeFiles as $routes) {
    include $routes;
}