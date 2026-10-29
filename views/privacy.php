<?php
/**
 * Privacy Policy Page View
 */

require_once __DIR__ . '/../includes/utils.php';

ob_start();
?>
<main class="mx-auto max-w-3xl px-5 py-16 leading-7 text-slate-600 lg:px-8">
  <h1 class="text-4xl font-extrabold text-[#102A43]">Privacy policy</h1>
  <p class="mt-6">
    All About Driver does not require an account to read guides. If you contact us, we use the information you provide only to respond or review your suggestion. We do not sell personal information.
  </p>
  <h2 class="mt-10 text-2xl font-bold text-[#102A43]">Analytics</h2>
  <p class="mt-3">
    A deployed version may use privacy-conscious analytics to understand general site usage. Browser settings and applicable laws may provide additional choices.
  </p>
</main>
<?php
$content = ob_get_clean();
render_shell('Privacy Policy', 'Privacy policy for All About Driver website visitors.', $content, '/privacy-policy');
