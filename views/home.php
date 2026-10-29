<?php
/**
 * Home Page View
 */

require_once __DIR__ . '/../includes/articles.php';
require_once __DIR__ . '/../includes/icons.php';
require_once __DIR__ . '/../includes/utils.php';

$issues = [
    ['Printer Not Printing', 'Resolve stuck jobs, missing output, and device status issues.', 'printer-not-printing', 'printer'],
    ['Printer Offline', 'Reconnect your printer and clear the most common offline causes.', 'printer-offline', 'network'],
    ['Wi-Fi & Connectivity', 'Get wireless printers talking to the right network again.', 'connect-printer-to-wifi', 'laptop'],
    ['Paper Jams', 'Clear jams safely and prevent repeat feed errors.', 'paper-jam', 'file-text'],
    ['Poor Print Quality', 'Fix faded, streaky, blank, or smudged pages.', 'faded-streaky-printing', 'gauge'],
    ['Drivers & Setup', 'Install, update, or repair the software your computer needs.', 'install-printer-driver', 'settings-2'],
];

// Articles JSON payload for client-side search autocomplete
$articlesJson = json_encode(array_map(function($a) {
    return [
        'slug' => $a['slug'],
        'title' => $a['title'],
        'category' => $a['category'],
        'readTime' => $a['readTime'],
        'description' => $a['description'],
        'keywords' => $a['keywords']
    ];
}, $articles));

ob_start();
?>
<main>
  <!-- Hero Section -->
  <section class="relative overflow-hidden border-b border-blue-100 bg-[#EFF6FF]">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-16 md:grid-cols-[1.05fr_.95fr] md:py-20 lg:px-8">
      <div class="relative z-10">
        <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-blue-200 bg-white px-3 py-1.5 text-xs font-bold text-[#0866D9]">
          <?= render_icon('sparkles', '', 14) ?> Clear answers. Less guesswork.
        </div>
        <h1 class="max-w-xl text-4xl font-extrabold leading-[1.05] tracking-tight text-[#102A43] md:text-6xl">
          Printer problems? <span class="text-[#0866D9]">Let's fix them.</span>
        </h1>
        <p class="mt-5 max-w-lg text-lg leading-8 text-slate-600">
          Find simple, step-by-step solutions for printer errors, Wi-Fi issues, paper jams, print quality problems, and more.
        </p>

        <!-- Search Box -->
        <div id="home-search-wrapper" class="relative mt-8 max-w-2xl">
          <form action="/search" method="GET" class="flex items-center gap-3 rounded-2xl border border-blue-200 bg-white p-2 shadow-lg shadow-blue-900/5">
            <span class="ml-3 text-[#0866D9]">
              <?= render_icon('search', '', 21) ?>
            </span>
            <input 
              id="home-search-input" 
              name="q" 
              type="text" 
              autocomplete="off" 
              class="min-w-0 flex-1 bg-transparent px-1 py-3 text-sm outline-none" 
              placeholder="Search your printer problem or error code..." 
              aria-label="Search printer problems"
            >
            <button type="button" id="home-search-clear" class="hidden text-slate-400 hover:text-slate-600 p-1" aria-label="Clear search">
              <?= render_icon('x', '', 17) ?>
            </button>
            <button type="submit" class="hidden rounded-xl bg-[#0866D9] px-5 py-3 text-sm font-bold text-white sm:block hover:bg-blue-700 transition">
              Search
            </button>
          </form>

          <!-- Autocomplete results dropdown -->
          <div id="home-search-results" class="hidden absolute left-0 right-0 top-[70px] z-20 rounded-2xl border border-slate-200 bg-white p-2 shadow-xl">
            <div id="home-search-results-list"></div>
          </div>
        </div>

        <!-- Quick Suggestions -->
        <div class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-xs text-slate-500">
          <span>Try:</span>
          <button type="button" class="quick-search-tag font-semibold text-[#0866D9] hover:underline" data-term="Printer not printing">Printer not printing</button>
          <button type="button" class="quick-search-tag font-semibold text-[#0866D9] hover:underline" data-term="Printer offline">Printer offline</button>
          <button type="button" class="quick-search-tag font-semibold text-[#0866D9] hover:underline" data-term="Blank pages">Blank pages</button>
        </div>
      </div>

      <!-- Hero Graphic -->
      <div class="relative flex min-h-[280px] items-center justify-center md:min-h-[350px]">
        <div class="absolute size-72 rounded-full bg-white/70 blur-sm"></div>
        <div class="relative w-64 rounded-3xl bg-[#102A43] p-5 shadow-2xl shadow-blue-900/20">
          <div class="mb-4 h-20 rounded-xl bg-slate-200 p-3">
            <div class="h-full rounded-md border-2 border-dashed border-slate-400 bg-white"></div>
          </div>
          <div class="mx-auto h-5 w-20 rounded-full bg-blue-400"></div>
          <div class="mt-5 h-3 rounded-full bg-slate-500"></div>
          <div class="mt-2 h-2 w-3/4 rounded-full bg-slate-600"></div>
          <div class="absolute -right-10 -top-8 flex size-16 items-center justify-center rounded-2xl bg-white text-[#0866D9] shadow-xl">
            <?= render_icon('circle-check', '', 30) ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Start Here: Common Issues -->
  <section class="mx-auto max-w-7xl px-5 py-16 lg:px-8">
    <div class="flex items-end justify-between gap-4">
      <div>
        <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">Start here</p>
        <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-[#102A43]">What can we help you fix?</h2>
      </div>
      <a href="/category/troubleshooting" class="hidden items-center gap-2 text-sm font-bold text-[#0866D9] sm:flex hover:underline">
        View all solutions <?= render_icon('arrow-right', '', 16) ?>
      </a>
    </div>

    <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($issues as [$title, $desc, $slug, $icon]): ?>
        <a href="/troubleshooting/<?= e($slug) ?>" class="group rounded-2xl border border-slate-200 bg-white p-6 transition hover:-translate-y-1 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-900/5">
          <span class="flex size-11 items-center justify-center rounded-xl bg-blue-50 text-[#0866D9]">
            <?= render_icon($icon, '', 21) ?>
          </span>
          <h3 class="mt-5 font-bold text-slate-900"><?= e($title) ?></h3>
          <p class="mt-2 text-sm leading-6 text-slate-500"><?= e($desc) ?></p>
          <span class="mt-5 flex items-center gap-2 text-sm font-bold text-[#0866D9]">
            View solutions <?= render_icon('arrow-right', 'transition group-hover:translate-x-1', 15) ?>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Quick Answers / Symptoms -->
  <section class="border-y border-slate-200 bg-slate-50">
    <div class="mx-auto grid max-w-7xl gap-10 px-5 py-16 lg:grid-cols-[.9fr_1.1fr] lg:px-8">
      <div>
        <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">Quick answers</p>
        <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-[#102A43]">Common symptoms, direct fixes.</h2>
        <p class="mt-4 max-w-md leading-7 text-slate-600">
          Start with the symptom you see. We'll point you to a focused guide instead of a wall of technical jargon.
        </p>
        <a href="/category/troubleshooting" class="mt-6 inline-flex items-center gap-2 text-sm font-bold text-[#0866D9] hover:underline">
          Open troubleshooting hub <?= render_icon('arrow-right', '', 16) ?>
        </a>
      </div>

      <div class="grid gap-x-8 sm:grid-cols-2">
        <?php foreach ($symptomLinks as [$label, $slug]): ?>
          <a href="/troubleshooting/<?= e($slug) ?>" class="flex items-start gap-3 border-b border-slate-200 py-4 text-sm font-semibold text-slate-700 hover:text-[#0866D9]">
            <span class="mt-0.5 shrink-0 text-[#0866D9]">
              <?= render_icon('circle-check', '', 17) ?>
            </span>
            <span><?= e($label) ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Featured Troubleshooting Guides -->
  <section class="mx-auto max-w-7xl px-5 py-16 lg:px-8">
    <div class="flex flex-wrap items-end justify-between gap-5">
      <div>
        <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">From the guide</p>
        <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-[#102A43]">Featured troubleshooting guides</h2>
      </div>

      <div class="flex flex-wrap gap-2">
        <button type="button" data-category="All Guides" class="category-filter-btn rounded-full px-3.5 py-2 text-xs font-bold transition bg-[#0866D9] text-white">All Guides</button>
        <?php foreach (array_slice($categories, 0, 5) as $cat): ?>
          <button type="button" data-category="<?= e($cat) ?>" class="category-filter-btn rounded-full px-3.5 py-2 text-xs font-bold transition bg-blue-50 text-[#0866D9] hover:bg-blue-100"><?= e($cat) ?></button>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($featuredArticles as $i => $a): ?>
        <?php 
          $bgClass = ($i % 3 === 0) ? 'bg-blue-50' : (($i % 3 === 1) ? 'bg-slate-100' : 'bg-[#e8f5ef]');
        ?>
        <a href="/troubleshooting/<?= e($a['slug']) ?>" data-category="<?= e($a['category']) ?>" class="featured-guide-card group overflow-hidden rounded-2xl border border-slate-200 bg-white">
          <div class="relative h-36 overflow-hidden <?= $bgClass ?>">
            <img src="<?= e($a['image']) ?>" alt="<?= e($a['imageAlt']) ?>" class="h-full w-full object-cover" loading="lazy">
          </div>
          <div class="p-5">
            <p class="text-xs font-bold uppercase tracking-wide text-[#0866D9]"><?= e($a['category']) ?></p>
            <h3 class="mt-2 font-bold leading-6 text-slate-900 group-hover:text-[#0866D9] transition"><?= e($a['title']) ?></h3>
            <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-500"><?= e($a['description']) ?></p>
            <p class="mt-4 text-xs font-semibold text-slate-400">
              <?= e($a['readTime']) ?> <span class="mx-1">·</span> Read guide 
              <span class="inline-block ml-0.5"><?= render_icon('arrow-right', '', 13) ?></span>
            </p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Safe Quick Checks Banner -->
  <section class="mx-auto max-w-7xl px-5 pb-16 lg:px-8">
    <div class="grid gap-8 rounded-3xl bg-[#102A43] p-8 text-white md:grid-cols-[.8fr_1.2fr] md:p-12">
      <div>
        <span class="text-blue-300">
          <?= render_icon('shield-check', '', 30) ?>
        </span>
        <h2 class="mt-4 text-2xl font-extrabold">Try these quick fixes first.</h2>
        <p class="mt-3 text-sm leading-6 text-slate-300">Before opening a panel or replacing parts, run through these safe checks.</p>
        <a href="/troubleshooting/printer-not-printing" class="mt-6 inline-flex items-center gap-2 rounded-xl bg-white px-4 py-3 text-sm font-bold text-[#102A43] hover:bg-slate-100 transition">
          Full troubleshooting guide <?= render_icon('arrow-right', '', 15) ?>
        </a>
      </div>

      <ol class="grid gap-3 sm:grid-cols-2">
        <?php 
        $quickChecks = [
            'Check that the printer is powered on.',
            'Check the display for error messages.',
            'Confirm paper is loaded correctly.',
            'Check ink or toner levels.',
            'Verify USB or Wi-Fi connection.',
            'Check the queue for stuck jobs.'
        ];
        foreach ($quickChecks as $idx => $check): ?>
          <li class="flex gap-3 rounded-xl bg-white/10 p-3 text-sm text-slate-200">
            <span class="font-bold text-blue-300">0<?= $idx + 1 ?></span>
            <span><?= e($check) ?></span>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
  </section>

  <!-- FAQ Accordion -->
  <section class="mx-auto max-w-3xl px-5 pb-20 lg:px-8">
    <div class="text-center">
      <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">Need a little more clarity?</p>
      <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-[#102A43]">Frequently asked questions</h2>
    </div>

    <div class="faq-group mt-8 divide-y divide-slate-200 border-y border-slate-200">
      <?php foreach ($faqs as $i => [$q, $a]): ?>
        <div class="faq-item">
          <button type="button" class="faq-toggle flex w-full items-center justify-between gap-4 py-5 text-left font-bold text-slate-800 hover:text-[#0866D9] transition">
            <span><?= e($q) ?></span>
            <span class="faq-icon-chevron shrink-0 text-slate-400 <?= $i === 0 ? 'hidden' : '' ?>">
              <?= render_icon('chevron-down', '', 18) ?>
            </span>
            <span class="faq-icon-close shrink-0 text-[#0866D9] <?= $i === 0 ? '' : 'hidden' ?>">
              <?= render_icon('x', '', 18) ?>
            </span>
          </button>
          <div class="faq-answer -mt-2 pb-5 pr-8 text-sm leading-7 text-slate-600 <?= $i === 0 ? '' : 'hidden' ?>">
            <p><?= e($a) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</main>

<script>
  window.__ALL_ARTICLES__ = <?= $articlesJson ?>;
</script>
<?php
$content = ob_get_clean();
render_shell('All About Driver — Printer help, without the jargon', 'Clear, independent printer troubleshooting guides for errors, Wi-Fi, setup, print quality, and drivers.', $content, '/');
