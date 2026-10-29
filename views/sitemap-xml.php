<?php
/**
 * XML Sitemap Generator
 */

require_once __DIR__ . '/../includes/articles.php';

header('Content-Type: application/xml; charset=utf-8');

$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost');

echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?= $host ?>/</loc>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc><?= $host ?>/about</loc>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
  </url>
  <url>
    <loc><?= $host ?>/contact</loc>
    <changefreq>monthly</changefreq>
    <priority>0.5</priority>
  </url>
  <url>
    <loc><?= $host ?>/editorial-policy</loc>
    <changefreq>monthly</changefreq>
    <priority>0.4</priority>
  </url>
  <url>
    <loc><?= $host ?>/privacy-policy</loc>
    <changefreq>monthly</changefreq>
    <priority>0.4</priority>
  </url>
  <url>
    <loc><?= $host ?>/terms</loc>
    <changefreq>monthly</changefreq>
    <priority>0.4</priority>
  </url>
  <url>
    <loc><?= $host ?>/disclaimer</loc>
    <changefreq>monthly</changefreq>
    <priority>0.4</priority>
  </url>
  <url>
    <loc><?= $host ?>/sitemap</loc>
    <changefreq>weekly</changefreq>
    <priority>0.6</priority>
  </url>

  <!-- Categories -->
  <?php foreach ($categories as $cat): ?>
    <url>
      <loc><?= $host ?>/category/<?= slugifyCategory($cat) ?></loc>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
    </url>
  <?php endforeach; ?>

  <!-- Articles -->
  <?php foreach ($articles as $a): ?>
    <url>
      <loc><?= $host ?>/troubleshooting/<?= $a['slug'] ?></loc>
      <changefreq>monthly</changefreq>
      <priority>0.9</priority>
    </url>
  <?php endforeach; ?>
</urlset>
