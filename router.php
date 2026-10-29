<?php
/**
 * Local Development Server Router
 * Usage: php -S localhost:8000 router.php
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Check if static file exists in public/
$publicFile = __DIR__ . '/public' . $uri;
if ($uri !== '/' && file_exists($publicFile) && is_file($publicFile)) {
    return false; // Let built-in PHP server serve the file directly
}

// Otherwise pass to api/index.php
require __DIR__ . '/api/index.php';
