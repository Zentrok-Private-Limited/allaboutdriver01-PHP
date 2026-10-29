<?php
/**
 * About Page View
 */

require_once __DIR__ . '/../includes/utils.php';

ob_start();
?>
<main class="mx-auto max-w-3xl px-5 py-16 lg:px-8">
  <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">About All About Driver</p>
  <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-[#102A43]">Printer help for real-world problems.</h1>
  <p class="mt-6 text-lg leading-8 text-slate-600">
    All About Driver is an independent informational resource for people who need a clear next step when a printer stops cooperating.
  </p>
  <div class="mt-10 flex flex-col gap-7 text-slate-600 leading-7">
    <p>
      We organize common printer errors, setup questions, connectivity issues, and print quality symptoms into approachable guides. Our goal is not to overwhelm you with jargon, but to help you identify the safest useful check first.
    </p>
    <p>
      Printer menus and procedures vary by model. We clearly separate general guidance from steps that should be confirmed in an official manufacturer manual.
    </p>
  </div>
</main>
<?php
$content = ob_get_clean();
render_shell('About Us', 'Learn about All About Driver, an independent informational resource for everyday printer troubleshooting.', $content, '/about');
