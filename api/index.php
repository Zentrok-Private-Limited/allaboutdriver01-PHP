<?php
/**
 * Main Application Router & Entry Point
 * Compatible with Vercel Serverless PHP runtime (vercel-php) and local PHP development servers.
 */

// Error handling in production vs development
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ini_set('display_errors', '0');

require_once __DIR__ . '/../includes/articles.php';
require_once __DIR__ . '/../includes/icons.php';
require_once __DIR__ . '/../includes/utils.php';
require_once __DIR__ . '/../includes/layout.php';

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$parsedPath = parse_url($requestUri, PHP_URL_PATH);
$path = '/' . trim($parsedPath, '/');
if ($path === '//') {
    $path = '/';
}

// Fallback for static files if requested through the PHP runner
$publicDir = realpath(__DIR__ . '/../public');
if ($publicDir) {
    $staticFile = realpath($publicDir . $path);
    if ($staticFile && strpos($staticFile, $publicDir) === 0 && is_file($staticFile)) {
        $ext = pathinfo($staticFile, PATHINFO_EXTENSION);
        $mimes = [
            'css' => 'text/css; charset=utf-8',
            'js' => 'application/javascript; charset=utf-8',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon',
            'webp' => 'image/webp',
            'json' => 'application/json',
            'xml' => 'application/xml'
        ];
        $contentType = $mimes[strtolower($ext)] ?? mime_content_type($staticFile) ?: 'application/octet-stream';
        header("Content-Type: $contentType");
        header("Cache-Control: public, max-age=31536000");
        readfile($staticFile);
        exit;
    }
}

// Route dispatching
switch ($path) {
    case '/':
        require __DIR__ . '/../views/home.php';
        break;

    case '/about':
        require __DIR__ . '/../views/about.php';
        break;

    case '/contact':
        require __DIR__ . '/../views/contact.php';
        break;

    case '/disclaimer':
        require __DIR__ . '/../views/disclaimer.php';
        break;

    case '/editorial-policy':
        require __DIR__ . '/../views/editorial.php';
        break;

    case '/privacy-policy':
        require __DIR__ . '/../views/privacy.php';
        break;

    case '/terms':
        require __DIR__ . '/../views/terms.php';
        break;

    case '/sitemap':
        require __DIR__ . '/../views/sitemap.php';
        break;

    case '/sitemap.xml':
        require __DIR__ . '/../views/sitemap-xml.php';
        break;

    case '/search':
        require __DIR__ . '/../views/search.php';
        break;

    default:
        // Match /category/{slug}
        if (preg_match('#^/category/([a-zA-Z0-9_-]+)$#', $path, $matches)) {
            $slug = $matches[1];
            require __DIR__ . '/../views/category.php';
            break;
        }

        // Match /troubleshooting/{slug}
        if (preg_match('#^/troubleshooting/([a-zA-Z0-9_-]+)$#', $path, $matches)) {
            $slug = $matches[1];
            $article = getArticle($slug);
            require __DIR__ . '/../views/article.php';
            break;
        }

        // 404 handler
        require __DIR__ . '/../views/404.php';
        break;
}
