<?php
/**
 * Terms of Use Page View
 */

require_once __DIR__ . '/../includes/utils.php';

ob_start();
?>
<main class="mx-auto max-w-3xl px-5 py-16 leading-7 text-slate-600 lg:px-8">
  <h1 class="text-4xl font-extrabold text-[#102A43]">Terms of use</h1>
  <p class="mt-6">
    All About Driver is provided for general information. Use your printer manufacturer's documentation for model-specific safety instructions. We are not responsible for damage caused by applying general guidance to equipment.
  </p>
  <h2 class="mt-10 text-2xl font-bold text-[#102A43]">Acceptable use</h2>
  <p class="mt-3">
    Please use this site lawfully and do not copy, scrape, or republish its content without permission.
  </p>
</main>
<?php
$content = ob_get_clean();
render_shell('Terms of Use', 'Terms of use for All About Driver.', $content, '/terms');
