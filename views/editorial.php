<?php
/**
 * Editorial Policy Page View
 */

require_once __DIR__ . '/../includes/utils.php';

ob_start();
?>
<main class="mx-auto max-w-3xl px-5 py-16 leading-7 text-slate-600 lg:px-8">
  <h1 class="text-4xl font-extrabold tracking-tight text-[#102A43]">Editorial policy</h1>
  <p class="mt-6">
    Our guides aim to be accurate, practical, and transparent. We use general troubleshooting knowledge and encourage readers to verify model-specific steps with official documentation.
  </p>
  <h2 class="mt-10 text-2xl font-bold text-[#102A43]">Corrections</h2>
  <p class="mt-3">
    If you spot an error or outdated instruction, contact us with the article URL and the correction. We do not publish fake reviews, endorsements, credentials, or test results.
  </p>
</main>
<?php
$content = ob_get_clean();
render_shell('Editorial Policy', 'Editorial standards and correction policy for All About Driver.', $content, '/editorial-policy');
