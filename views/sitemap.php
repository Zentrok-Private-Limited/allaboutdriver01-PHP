<?php
/**
 * HTML Sitemap Page View
 */

require_once __DIR__ . '/../includes/articles.php';
require_once __DIR__ . '/../includes/utils.php';

ob_start();
?>
<main class="mx-auto max-w-4xl px-5 py-16 lg:px-8">
  <div class="max-w-2xl">
    <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">Site Index</p>
    <h1 class="mt-3 text-4xl font-extrabold text-[#102A43]">Sitemap</h1>
    <p class="mt-4 text-slate-600">Browse all <?= count($articles) ?> independent printer troubleshooting guides by title.</p>
  </div>

  <div class="mt-10 grid gap-3 sm:grid-cols-2">
    <?php foreach ($articles as $a): ?>
      <a href="/troubleshooting/<?= e($a['slug']) ?>" class="rounded-xl border border-slate-200 bg-white p-4 text-sm font-semibold text-slate-700 hover:border-blue-200 hover:text-[#0866D9] transition">
        <?= e($a['title']) ?>
      </a>
    <?php endforeach; ?>
  </div>
</main>
<?php
$content = ob_get_clean();
render_shell('Sitemap', 'Directory of all printer troubleshooting guides on All About Driver.', $content, '/sitemap');
