<?php
/**
 * Contact Page View
 */

require_once __DIR__ . '/../includes/utils.php';

$sent = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // In demo / serverless mode, confirm receipt
    $sent = true;
}

ob_start();
?>
<main class="mx-auto max-w-2xl px-5 py-16 lg:px-8">
  <p class="text-sm font-bold uppercase tracking-widest text-[#0866D9]">Contact</p>
  <h1 class="mt-3 text-4xl font-extrabold tracking-tight text-[#102A43]">Tell us what would help.</h1>
  <p class="mt-4 leading-7 text-slate-600">
    Have a correction or a guide suggestion? Send us a message and we'll look into improving our resources.
  </p>

  <div id="contact-success" class="<?= $sent ? '' : 'hidden' ?> mt-8 rounded-2xl border border-green-200 bg-green-50 p-5 text-sm leading-6 text-green-800">
    Thanks — your message has been received! We appreciate your suggestions and feedback.
  </div>

  <form id="contact-form" method="POST" action="/contact" class="<?= $sent ? 'hidden' : '' ?> mt-8 flex flex-col gap-5">
    <label class="text-sm font-bold text-slate-700">
      Your email
      <input required type="email" name="email" class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#0866D9]" placeholder="you@example.com">
    </label>
    <label class="text-sm font-bold text-slate-700">
      Message
      <textarea required minlength="10" name="message" class="mt-2 min-h-36 w-full rounded-xl border border-slate-200 px-4 py-3 outline-none focus:border-[#0866D9]" placeholder="What should we know?"></textarea>
    </label>
    <button type="submit" class="rounded-xl bg-[#0866D9] px-5 py-3 font-bold text-white hover:bg-blue-700 transition">
      Submit message
    </button>
  </form>
</main>
<?php
$content = ob_get_clean();
render_shell('Contact Us', 'Contact All About Driver with corrections, suggestions, or feedback.', $content, '/contact');
