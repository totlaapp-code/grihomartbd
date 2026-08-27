<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

$fileInPublic = __DIR__ . '/public' . $uri;
$fileInRoot = __DIR__ . $uri;

if ($uri !== '/' && file_exists($fileInPublic) && !is_dir($fileInPublic)) {
    return false;
}
if ($uri !== '/' && file_exists($fileInRoot) && !is_dir($fileInRoot)) {
    return false;
}

require_once __DIR__.'/public/index.php';
