<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Check if the app is in maintenance mode
if (file_exists($maintenance = __DIR__ . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader
require __DIR__ . '/vendor/autoload.php';

/** @var Application $app */
$app = require_once __DIR__ . '/bootstrap/app.php';

// Tell Laravel where the public folder (assets) is located
$app->usePublicPath(__DIR__ . '/public');

// Handle the incoming HTTP request
$app->handleRequest(Request::capture());
