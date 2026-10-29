<?php
/**
 * Site Layout and Shell Helpers
 */

require_once __DIR__ . '/icons.php';
require_once __DIR__ . '/utils.php';

function render_header($activePath = '') {
    $nav = [
        ['Troubleshooting', '/category/troubleshooting'],
        ['Setup', '/category/setup'],
        ['Connectivity', '/category/connectivity'],
        ['Print Quality', '/category/print-quality'],
        ['Drivers', '/category/drivers-software'],
        ['Guides', '/category/maintenance-care']
    ];
    ob_start();
    ?>
    <header class="sticky top-0 z-40 border-b border-slate-200 bg-white/95 backdrop-blur">
      <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-5 lg:px-8">
        <a href="/" class="flex items-center gap-2.5 text-slate-950">
          <span class="flex size-9 items-center justify-center rounded-xl bg-[#0866D9] text-white">
            <?= render_icon('printer', '', 19) ?>
          </span>
          <span class="text-lg font-bold tracking-tight">All About <span class="text-[#0866D9]">Driver</span></span>
        </a>
        <nav class="hidden items-center gap-6 lg:flex">
          <?php foreach ($nav as [$label, $href]): ?>
            <a href="<?= e($href) ?>" class="text-sm font-medium text-slate-600 transition hover:text-[#0866D9]"><?= e($label) ?></a>
          <?php endforeach; ?>
          <a href="/search" aria-label="Search" class="rounded-full border border-slate-200 p-2 text-slate-600 hover:text-[#0866D9]">
            <?= render_icon('search', '', 17) ?>
          </a>
        </nav>
        <button id="mobile-menu-btn" class="rounded-lg p-2 text-slate-700 lg:hidden" aria-label="Toggle navigation menu">
          <span id="menu-icon-bars"><?= render_icon('menu', '', 22) ?></span>
          <span id="menu-icon-close" class="hidden"><?= render_icon('x', '', 22) ?></span>
        </button>
      </div>
      <nav id="mobile-menu" class="hidden border-t border-slate-100 bg-white px-5 py-4 lg:hidden">
        <?php foreach ($nav as [$label, $href]): ?>
          <a href="<?= e($href) ?>" class="flex items-center justify-between border-b border-slate-100 py-3 text-sm font-semibold text-slate-700">
            <?= e($label) ?>
            <?= render_icon('arrow-right', '', 15) ?>
          </a>
        <?php endforeach; ?>
        <a href="/search" class="flex items-center justify-between py-3 text-sm font-semibold text-[#0866D9]">
          Search guides
          <?= render_icon('search', '', 16) ?>
        </a>
      </nav>
    </header>
    <?php
    return ob_get_clean();
}

function render_footer() {
    ob_start();
    ?>
    <footer class="border-t border-slate-200 bg-[#102A43] text-slate-300">
      <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 md:grid-cols-[1.5fr_1fr_1fr] lg:px-8">
        <div>
          <a href="/" class="flex items-center gap-2 text-lg font-bold text-white">
            <span class="flex size-8 items-center justify-center rounded-lg bg-[#0866D9]">
              <?= render_icon('printer', '', 16) ?>
            </span>
            All About Driver
          </a>
          <p class="mt-4 max-w-sm text-sm leading-6 text-slate-400">Independent printer information and troubleshooting resources for everyday users.</p>
        </div>
        <div>
          <p class="mb-4 text-sm font-bold text-white">Explore</p>
          <div class="flex flex-col gap-3 text-sm">
            <a href="/category/troubleshooting" class="hover:text-white transition">Troubleshooting</a>
            <a href="/category/setup" class="hover:text-white transition">Printer setup</a>
            <a href="/category/print-quality" class="hover:text-white transition">Print quality</a>
            <a href="/sitemap" class="hover:text-white transition">Sitemap</a>
          </div>
        </div>
        <div>
          <p class="mb-4 text-sm font-bold text-white">About</p>
          <div class="flex flex-col gap-3 text-sm">
            <a href="/about" class="hover:text-white transition">About us</a>
            <a href="/contact" class="hover:text-white transition">Contact</a>
            <a href="/editorial-policy" class="hover:text-white transition">Editorial policy</a>
            <a href="/privacy-policy" class="hover:text-white transition">Privacy policy</a>
            <a href="/terms" class="hover:text-white transition">Terms of use</a>
            <a href="/disclaimer" class="hover:text-white transition">Disclaimer</a>
          </div>
        </div>
      </div>
      <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-5 text-xs text-slate-500 md:flex-row md:justify-between lg:px-8">
          <span>&copy; <?= date('Y') ?> All About Driver. All rights reserved.</span>
          <span>Not affiliated with printer manufacturers.</span>
        </div>
      </div>
    </footer>
    <?php
    return ob_get_clean();
}

function render_shell($title, $description, $content, $canonicalUrl = '', $ogImage = '/printer-guide-hero.png') {
    $fullTitle = $title ? "$title | All About Driver" : "All About Driver — Printer help, without the jargon";
    if ($title === 'All About Driver — Printer help, without the jargon') {
        $fullTitle = $title;
    }
    $metaDesc = $description ?: "Clear, independent printer troubleshooting guides for errors, Wi-Fi, setup, print quality, and drivers.";
    
    header('Content-Type: text/html; charset=utf-8');
    ?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($fullTitle) ?></title>
  <meta name="description" content="<?= e($metaDesc) ?>">
  <meta name="generator" content="All About Driver">
  <meta name="theme-color" content="#0866D9">
  
  <!-- Open Graph -->
  <meta property="og:title" content="<?= e($fullTitle) ?>">
  <meta property="og:description" content="<?= e($metaDesc) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= e($ogImage) ?>">
  <?php if ($canonicalUrl): ?>
    <meta property="og:url" content="<?= e($canonicalUrl) ?>">
    <link rel="canonical" href="<?= e($canonicalUrl) ?>">
  <?php endif; ?>

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/icon.svg">
  <link rel="icon" type="image/png" sizes="32x32" href="/icon-dark-32x32.png">
  <link rel="apple-touch-icon" href="/apple-icon.png">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="/css/style.css">

  <!-- Tailwind CSS via Official CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              DEFAULT: '#0866D9',
              foreground: '#ffffff'
            }
          }
        }
      }
    }
  </script>

  <style>
    :root {
      color-scheme: light;
      --background: #ffffff;
      --foreground: #1f2937;
      --border: #dce6f1;
      --ring: #0866d9;
      --primary: #0866d9;
      --primary-foreground: #ffffff;
    }
    * {
      box-sizing: border-box;
      border-color: var(--border);
    }
    body {
      margin: 0;
      background: var(--background);
      color: var(--foreground);
      font-family: Arial, Helvetica, sans-serif;
    }
    button, a {
      -webkit-tap-highlight-color: transparent;
    }
    ::selection {
      background: #bfdbfe;
      color: #102a43;
    }
    .line-clamp-2 {
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
  </style>
</head>
<body class="antialiased min-h-screen flex flex-col">
  <?= render_header() ?>
  
  <div class="flex-1">
    <?= $content ?>
  </div>

  <?= render_footer() ?>

  <!-- Interactive script for Navbar, Accordion, and Search -->
  <script src="/js/app.js"></script>
</body>
</html>
    <?php
}
