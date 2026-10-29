<?php
/**
 * Search Results Page View
 */

require_once __DIR__ . '/../includes/articles.php';
require_once __DIR__ . '/../includes/icons.php';
require_once __DIR__ . '/../includes/utils.php';

$query = isset($_GET['q']) ? trim($_GET['q']) : '';

$results = [];
if ($query !== '') {
    $qLower = strtolower($query);
    foreach ($articles as $a) {
        $searchable = strtolower($a['title'] . ' ' . $a['description'] . ' ' . $a['category'] . ' ' . implode(' ', $a['keywords']) . ' ' . implode(' ', $a['symptoms']));
        if (strpos($searchable, $qLower) !== false) {
            $results[] = $a;
        }
    }
}

ob_start();
?>
<main class="mx-auto max-w-4xl px-5 py-12 lg:px-8">
  <div class="max-w-2xl">
    <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">Troubleshooting Search</p>
    <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-[#102A43]">Search printer guides</h1>
    <p class="mt-4 text-slate-600">Find solutions by error symptom, code, model problem, or printer behavior.</p>
  </div>

  <form action="/search" method="GET" class="mt-8 flex items-center gap-3 rounded-2xl border border-blue-200 bg-white p-2 shadow-lg shadow-blue-900/5">
    <span class="ml-3 text-[#0866D9]">
      <?= render_icon('search', '', 21) ?>
    </span>
    <input 
      name="q" 
      type="text" 
      value="<?= e($query) ?>" 
      class="min-w-0 flex-1 bg-transparent px-2 py-3 text-sm outline-none" 
      placeholder="E.g. printer offline, paper jam, lines on page, Wi-Fi..." 
      autofocus
    >
    <button type="submit" class="rounded-xl bg-[#0866D9] px-6 py-3 text-sm font-bold text-white hover:bg-blue-700 transition">
      Search
    </button>
  </form>

  <div class="mt-10">
    <?php if ($query !== ''): ?>
      <p class="text-sm text-slate-500 mb-6">
        Found <strong class="text-slate-800"><?= count($results) ?></strong> <?= count($results) === 1 ? 'guide' : 'guides' ?> for "<span class="text-slate-800 font-semibold"><?= e($query) ?></span>":
      </p>

      <?php if (empty($results)): ?>
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-8 text-center">
          <p class="text-base text-slate-700 font-medium">No direct guides matched your search.</p>
          <p class="mt-2 text-sm text-slate-500">Try searching for broader keywords like "offline", "jam", "faded", or "wi-fi".</p>
          <div class="mt-6">
            <a href="/category/troubleshooting" class="inline-flex items-center gap-2 rounded-xl bg-[#0866D9] px-5 py-2.5 text-sm font-bold text-white hover:bg-blue-700">
              Browse all troubleshooting guides <?= render_icon('arrow-right', '', 14) ?>
            </a>
          </div>
        </div>
      <?php else: ?>
        <div class="grid gap-4 sm:grid-cols-2">
          <?php foreach ($results as $a): ?>
            <a href="/troubleshooting/<?= e($a['slug']) ?>" class="group rounded-2xl border border-slate-200 bg-white p-5 hover:border-blue-200 hover:shadow-lg transition">
              <span class="text-xs font-bold uppercase tracking-wide text-[#0866D9]"><?= e($a['category']) ?></span>
              <h2 class="mt-2 font-bold text-slate-900 group-hover:text-[#0866D9] transition"><?= e($a['title']) ?></h2>
              <p class="mt-2 text-sm leading-6 text-slate-500 line-clamp-2"><?= e($a['description']) ?></p>
              <div class="mt-4 flex items-center justify-between text-xs font-semibold text-slate-400">
                <span><?= e($a['readTime']) ?></span>
                <span class="flex items-center gap-1 text-[#0866D9] group-hover:underline">
                  Read guide <?= render_icon('arrow-right', '', 13) ?>
                </span>
              </div>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    <?php else: ?>
      <p class="text-sm font-bold uppercase tracking-wider text-slate-400 mb-4">Popular Searches</p>
      <div class="flex flex-wrap gap-2">
        <?php foreach (['Printer offline', 'Printer not printing', 'Paper jam', 'Faded printing', 'Connect to Wi-Fi', 'Install printer driver', 'Blank pages'] as $term): ?>
          <a href="/search?q=<?= urlencode($term) ?>" class="rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:border-blue-200 hover:text-[#0866D9] transition">
            <?= e($term) ?>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</main>
<?php
$content = ob_get_clean();
$title = $query ? "Search: $query" : "Search Guides";
render_shell($title, "Search printer troubleshooting guides and solutions on All About Driver.", $content, '/search');
