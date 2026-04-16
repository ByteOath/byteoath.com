<?php
/**
 * Component: CTA Banner
 * @var string $headline
 * @var string $sub
 * @var string $btn_text  default "Let's Talk →"
 * @var string $btn_href  default "/contact/"
 */
$headline = $headline ?? "Ready to Build?";
$sub      = $sub      ?? "Tell us what you're working on. We'll tell you if we can help.";
$btn_text = $btn_text ?? "Let's Talk →";
$btn_href = $btn_href ?? "/contact/";
?>
<section style="padding:5rem 0;" class="reveal">
  <div class="container-wide">
    <div style="background:linear-gradient(135deg,#1E2A42 0%,#1a2845 100%);border:1px solid rgba(0,212,255,0.2);border-radius:16px;padding:3rem 2.5rem;text-align:center;position:relative;overflow:hidden;">
      <!-- Orb decoration -->
      <div class="orb orb-cyan" style="width:300px;height:300px;top:-80px;right:-60px;opacity:0.5;"></div>
      <div class="orb orb-blue" style="width:200px;height:200px;bottom:-60px;left:-40px;opacity:0.4;"></div>

      <div style="position:relative;z-index:1;">
        <h2 class="font-display" style="margin-bottom:1rem;"><?= htmlspecialchars($headline) ?></h2>
        <p style="color:#8E9AAF;max-width:500px;margin:0 auto 2rem;"><?= htmlspecialchars($sub) ?></p>
        <a href="<?= htmlspecialchars($btn_href) ?>" class="btn-primary" style="font-size:0.9rem;">
          <?= htmlspecialchars($btn_text) ?>
        </a>
      </div>
    </div>
  </div>
</section>

