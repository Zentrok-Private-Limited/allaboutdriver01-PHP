<?php
/**
 * 404 Not Found Page View
 */

require_once __DIR__ . '/../includes/icons.php';
require_once __DIR__ . '/../includes/utils.php';

http_response_code(404);

ob_start();
?>
<main class="mx-auto max-w-3xl px-5 py-24 text-center">
  <div class="mx-auto flex size-16 items-center justify-center rounded-2xl bg-blue-50 text-[#0866D9]">
    <?= render_icon('printer', '', 32) ?>
  </div>
  <p class="mt-6 text-sm font-bold uppercase tracking-widest text-[#0866D9]">404 Error</p>
  <h1 class="mt-2 text-4xl font-extrabold tracking-tight text-[#102A43]">Page Not Found</h1>
  <p class="mt-4 text-lg text-slate-600">
    The page or guide you are looking for doesn't exist or may have been moved.
  </p>
  <div class="mt-8 flex flex-wrap justify-center gap-4">
    <a href="/" class="rounded-xl bg-[#0866D9] px-6 py-3 font-bold text-white hover:bg-blue-700 transition">
      Back to Homepage
    </a>
    <a href="/category/troubleshooting" class="rounded-xl border border-slate-200 px-6 py-3 font-bold text-slate-700 hover:border-blue-200 hover:text-[#0866D9] transition">
      Browse Troubleshooting
    </a>
  </div>
</main>
<?php
$content = ob_get_clean();
render_shell('Page Not Found', 'The requested page could not be found.', $content);
