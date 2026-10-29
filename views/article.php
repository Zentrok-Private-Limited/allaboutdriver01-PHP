<?php
/**
 * Troubleshooting Guide Detail Page View
 */

require_once __DIR__ . '/../includes/articles.php';
require_once __DIR__ . '/../includes/icons.php';
require_once __DIR__ . '/../includes/utils.php';

if (!isset($article) || !$article) {
    http_response_code(404);
    ob_start();
    ?>
    <main class="mx-auto max-w-3xl px-5 py-24 text-center">
      <h1 class="text-3xl font-bold text-[#102A43]">Guide not found</h1>
      <p class="mt-4 text-slate-600">The troubleshooting guide you requested does not exist or may have moved.</p>
      <a class="mt-6 inline-block font-bold text-[#0866D9] hover:underline" href="/">Back to home</a>
    </main>
    <?php
    $content = ob_get_clean();
    render_shell('Guide Not Found', 'The requested guide was not found.', $content);
    return;
}

$visual = visualGuideFor($article);
$related = relatedArticles($article);

ob_start();
?>
<main class="mx-auto max-w-7xl px-5 py-10 lg:px-8">
  <!-- Breadcrumbs -->
  <nav class="flex items-center gap-2 text-sm text-slate-500" aria-label="Breadcrumb">
    <a href="/" class="hover:text-[#0866D9]">Home</a>
    <span>/</span>
    <a href="/category/<?= e($article['categorySlug']) ?>" class="hover:text-[#0866D9]"><?= e($article['category']) ?></a>
    <span>/</span>
    <span class="truncate text-slate-800 font-medium">Guide</span>
  </nav>

  <div class="mt-10 grid gap-12 lg:grid-cols-[minmax(0,760px)_260px] lg:justify-center">
    <article id="top">
      <!-- Category & Title -->
      <div class="flex items-center gap-2 text-sm font-bold text-[#0866D9]">
        <?= render_icon('printer', '', 16) ?>
        <span><?= e($article['category']) ?></span>
      </div>
      <h1 class="mt-4 text-4xl font-extrabold leading-tight tracking-tight text-[#102A43] md:text-5xl">
        <?= e($article['title']) ?>
      </h1>
      <p class="mt-5 text-lg leading-8 text-slate-600">
        <?= e($article['description']) ?>
      </p>

      <!-- Meta Info -->
      <div class="mt-5 flex items-center gap-4 border-b border-slate-200 pb-7 text-sm text-slate-500">
        <span class="flex items-center gap-1.5">
          <?= render_icon('clock', '', 15) ?>
          <?= e($article['readTime']) ?>
        </span>
        <span>•</span>
        <span>Reviewed for general guidance</span>
      </div>

      <!-- Hero Visual -->
      <div class="mt-8 overflow-hidden rounded-3xl border border-blue-100 bg-blue-50">
        <img 
          src="<?= e($article['image']) ?>" 
          alt="<?= e($article['imageAlt']) ?>" 
          class="h-auto w-full object-cover" 
          width="1200" 
          height="675"
        >
        <p class="px-5 py-3 text-xs leading-5 text-slate-500"><?= e($article['imageAlt']) ?></p>
      </div>

      <!-- Before you begin & Quick Fix cards -->
      <div class="mt-8 grid gap-5 md:grid-cols-2">
        <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
          <p class="flex items-center gap-2 text-sm font-bold text-[#102A43]">
            <span class="text-[#0866D9]"><?= render_icon('shield-check', '', 17) ?></span>
            Before you begin
          </p>
          <p class="mt-2 text-sm leading-6 text-slate-600">
            Use the manufacturer's official manual for exact menus and model-specific procedures. Never force a cover, roller, cartridge, or heated component.
          </p>
        </section>

        <section class="rounded-2xl border border-amber-100 bg-amber-50 p-5">
          <p class="flex items-center gap-2 text-sm font-bold text-[#102A43]">
            <span class="text-amber-600"><?= render_icon('lightbulb', '', 17) ?></span>
            Quick fix
          </p>
          <p class="mt-2 text-sm leading-6 text-slate-600">
            Restart the print path in order: cancel the job, check the printer display, then print a built-in test page before changing drivers.
          </p>
        </section>
      </div>

      <!-- Symptoms & Causes -->
      <div id="symptoms-and-causes" class="mt-12 grid gap-8 md:grid-cols-2">
        <section>
          <h2 class="text-xl font-extrabold text-[#102A43]">Symptoms to look for</h2>
          <ul class="mt-4 flex flex-col gap-3">
            <?php foreach ($article['symptoms'] as $item): ?>
              <li class="flex gap-3 text-sm leading-6 text-slate-600">
                <span class="mt-1 shrink-0 text-[#0866D9]">
                  <?= render_icon('circle-check', '', 17) ?>
                </span>
                <span><?= e($item) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </section>

        <section>
          <h2 class="text-xl font-extrabold text-[#102A43]">Likely causes</h2>
          <ul class="mt-4 flex flex-col gap-3">
            <?php foreach ($article['causes'] as $item): ?>
              <li class="flex gap-3 text-sm leading-6 text-slate-600">
                <span class="mt-2 size-1.5 shrink-0 rounded-full bg-[#0866D9]"></span>
                <span><?= e($item) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </section>
      </div>

      <!-- Step-by-Step Instructions -->
      <div id="steps-section" class="mt-14">
        <h2 class="text-2xl font-extrabold text-[#102A43]">Work through these steps</h2>
        <div class="mt-6 flex flex-col gap-8">
          <?php foreach ($article['steps'] as $index => $step): ?>
            <section class="relative pl-14">
              <div class="absolute left-0 top-0 flex size-9 items-center justify-center rounded-full bg-[#0866D9] text-sm font-extrabold text-white">
                <?= $index + 1 ?>
              </div>
              <h3 class="text-lg font-bold text-slate-900"><?= e($step['title']) ?></h3>
              <p class="mt-2 leading-7 text-slate-600"><?= e($step['body']) ?></p>
              <div class="mt-3 flex gap-2 text-sm font-semibold text-green-700">
                <span class="shrink-0"><?= render_icon('circle-check', '', 17) ?></span>
                <span><?= e($step['outcome']) ?></span>
              </div>

              <?php if ($index === 1 && isset($visual['src'])): ?>
                <figure class="mt-6 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">
                  <img src="<?= e($visual['src']) ?>" alt="<?= e($visual['alt']) ?>" class="w-full object-cover" loading="lazy">
                  <figcaption class="px-4 py-3 text-xs leading-5 text-slate-500"><?= e($visual['caption']) ?></figcaption>
                </figure>
              <?php endif; ?>
            </section>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Prevention Tips -->
      <section id="prevention-section" class="mt-14 rounded-2xl border border-green-100 bg-green-50 p-6">
        <h2 class="text-xl font-extrabold text-[#102A43]">Prevent the problem next time</h2>
        <ul class="mt-4 grid gap-3 sm:grid-cols-3">
          <?php foreach ($article['prevention'] as $item): ?>
            <li class="text-sm leading-6 text-slate-600"><?= e($item) ?></li>
          <?php endforeach; ?>
        </ul>
      </section>

      <!-- FAQs -->
      <section id="faqs-section" class="mt-14">
        <h2 class="text-2xl font-extrabold text-[#102A43]">Frequently asked questions</h2>
        <div class="faq-group mt-5 divide-y divide-slate-200 border-y border-slate-200">
          <?php foreach ($article['faqs'] as $i => [$question, $answer]): ?>
            <div class="faq-item py-5">
              <button type="button" class="faq-toggle flex w-full items-center justify-between gap-4 text-left font-bold text-slate-900 hover:text-[#0866D9] transition">
                <span><?= e($question) ?></span>
                <span class="faq-icon-chevron shrink-0 text-slate-400 <?= $i === 0 ? 'hidden' : '' ?>">
                  <?= render_icon('chevron-down', '', 18) ?>
                </span>
                <span class="faq-icon-close shrink-0 text-[#0866D9] <?= $i === 0 ? '' : 'hidden' ?>">
                  <?= render_icon('x', '', 18) ?>
                </span>
              </button>
              <div class="faq-answer mt-2 text-sm leading-7 text-slate-600 <?= $i === 0 ? '' : 'hidden' ?>">
                <p><?= e($answer) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </section>

      <!-- Related Guides -->
      <?php if (!empty($related)): ?>
        <section id="related-section" class="mt-14">
          <h2 class="text-2xl font-extrabold text-[#102A43]">Related guides</h2>
          <div class="mt-5 grid gap-4 sm:grid-cols-2">
            <?php foreach ($related as $item): ?>
              <a href="/troubleshooting/<?= e($item['slug']) ?>" class="group rounded-2xl border border-slate-200 p-5 hover:border-blue-200 hover:shadow-lg transition">
                <p class="text-xs font-bold uppercase tracking-wide text-[#0866D9]"><?= e($item['category']) ?></p>
                <h3 class="mt-2 font-bold text-slate-900 group-hover:text-[#0866D9] transition"><?= e($item['title']) ?></h3>
                <p class="mt-2 text-sm leading-6 text-slate-500 line-clamp-2"><?= e($item['description']) ?></p>
                <span class="mt-4 flex items-center gap-2 text-sm font-bold text-[#0866D9]">
                  Read guide <?= render_icon('arrow-right', '', 15) ?>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>
    </article>

    <!-- Sidebar Navigation -->
    <aside class="hidden lg:block">
      <div class="sticky top-24 rounded-2xl border border-slate-200 bg-slate-50 p-5">
        <p class="text-xs font-bold uppercase tracking-widest text-[#0866D9]">In this guide</p>
        <nav class="mt-4 flex flex-col gap-3 text-sm font-semibold text-slate-600">
          <a href="#symptoms-and-causes" class="hover:text-[#0866D9]">Symptoms and causes</a>
          <a href="#steps-section" class="hover:text-[#0866D9]">Step-by-step checks</a>
          <a href="#prevention-section" class="hover:text-[#0866D9]">Prevention tips</a>
          <a href="#faqs-section" class="hover:text-[#0866D9]">FAQs</a>
          <?php if (!empty($related)): ?>
            <a href="#related-section" class="hover:text-[#0866D9]">Related guides</a>
          <?php endif; ?>
        </nav>
        <a href="/category/<?= e($article['categorySlug']) ?>" class="mt-6 flex items-center gap-2 border-t border-slate-200 pt-5 text-sm font-bold text-[#0866D9] hover:underline">
          More <?= e($article['category']) ?> guides <?= render_icon('arrow-right', '', 15) ?>
        </a>
      </div>
    </aside>
  </div>
</main>
<?php
$content = ob_get_clean();
render_shell($article['title'], $article['description'], $content, '/troubleshooting/' . $article['slug'], $article['image']);
