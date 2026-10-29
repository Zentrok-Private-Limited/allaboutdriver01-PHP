<?php
/**
 * Disclaimer Page View
 */

require_once __DIR__ . '/../includes/utils.php';

ob_start();
?>
<main class="mx-auto max-w-3xl px-5 py-16 leading-7 text-slate-600 lg:px-8">
  <h1 class="text-4xl font-extrabold text-[#102A43]">Disclaimer</h1>
  <p class="mt-6">
    All About Driver is an independent informational website. It is not affiliated with, sponsored by, or endorsed by HP, Canon, Epson, Brother, Xerox, Lexmark, or other printer manufacturers unless explicitly stated.
  </p>
  <p class="mt-5">
    Instructions are general and may not apply to every model, operating system, or network. When in doubt, consult the official manual or a qualified service provider.
  </p>
</main>
<?php
$content = ob_get_clean();
render_shell('Disclaimer', 'Independent informational website disclaimer for All About Driver.', $content, '/disclaimer');
