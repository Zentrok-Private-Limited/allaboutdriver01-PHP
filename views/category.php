<?php
/**
 * Category Listing Page View
 */

require_once __DIR__ . '/../includes/articles.php';
require_once __DIR__ . '/../includes/icons.php';
require_once __DIR__ . '/../includes/utils.php';

$categoryTitle = 'Printer Guides';
foreach ($categories as $cat) {
    if (slugifyCategory($cat) === $slug) {
        $categoryTitle = $cat;
        break;
    }
}

$categoryArticles = getCategoryArticles($slug);
$intro = isset($categoryIntro[$categoryTitle]) 
    ? $categoryIntro[$categoryTitle] 
    : 'Practical, model-conscious guidance to help you diagnose printer issues and get back to work.';

ob_start();
?>
<main class="mx-auto max-w-7xl px-5 py-12 lg:px-8">
  <!-- Breadcrumbs -->
  <nav class="flex items-center gap-2 text-sm text-slate-500" aria-label="Breadcrumb">
    <a href="/" class="hover:text-[#0866D9]">Home</a>
    <span>/</span>
    <span class="text-slate-800 font-medium"><?= e($categoryTitle) ?></span>
  </nav>

  <div class="mt-10 max-w-2xl">
    <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">All About Driver library</p>
    <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-[#102A43]"><?= e($categoryTitle) ?></h1>
    <p class="mt-4 text-lg leading-8 text-slate-600"><?= e($intro) ?></p>
  </div>

  <div class="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
    <?php if (empty($categoryArticles)): ?>
      <div class="col-span-full py-12 text-center text-slate-500">
        <p>No guides found in this category currently.</p>
        <a href="/" class="mt-4 inline-block font-bold text-[#0866D9]">Return to home</a>
      </div>
    <?php else: ?>
      <?php foreach ($categoryArticles as $a): ?>
        <a href="/troubleshooting/<?= e($a['slug']) ?>" class="group rounded-2xl border border-slate-200 p-6 hover:border-blue-200 hover:shadow-lg transition">
          <div class="flex size-11 items-center justify-center rounded-xl bg-blue-50 text-[#0866D9]">
            <?= render_icon('printer', '', 20) ?>
          </div>
          <h2 class="mt-5 font-bold text-slate-900 group-hover:text-[#0866D9] transition"><?= e($a['title']) ?></h2>
          <p class="mt-2 text-sm leading-6 text-slate-500 line-clamp-2"><?= e($a['description']) ?></p>
          <span class="mt-5 flex items-center gap-2 text-sm font-bold text-[#0866D9]">
            Read guide <?= render_icon('arrow-right', 'transition group-hover:translate-x-1', 15) ?>
          </span>
        </a>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <section class="mt-16 rounded-2xl border border-blue-100 bg-blue-50 p-7">
    <div class="flex items-start gap-4">
      <div class="mt-1 text-[#0866D9]">
        <?= render_icon('book-open', '', 24) ?>
      </div>
      <div>
        <h2 class="font-bold text-[#102A43]">Need a starting point?</h2>
        <p class="mt-2 text-sm leading-6 text-slate-600">
          If you are not sure which path fits, start with our general troubleshooting guide and follow the symptom that best matches what you see.
        </p>
        <a href="/troubleshooting/printer-not-printing" class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-[#0866D9] hover:underline">
          Start troubleshooting <?= render_icon('arrow-right', '', 15) ?>
        </a>
      </div>
    </div>
  </section>
</main>
<?php
$content = ob_get_clean();
render_shell($categoryTitle . ' Guides', "Troubleshooting guides and advice for $categoryTitle printer problems.", $content, '/category/' . $slug);
