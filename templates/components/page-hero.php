<?php
/**
 * Component: Page Hero
 * @var string $label     small mono label (optional)
 * @var string $headline  main H1
 * @var string $sub       subtext (optional)
 */
$label    = $label ?? '';
$sub      = $sub ?? '';
?>
<section style="padding:5rem 0 4rem;position:relative;overflow:hidden;">
  <!-- Grid bg -->
  <div class="bg-grid" style="position:absolute;inset:0;opacity:0.5;"></div>
  <!-- Orb -->
  <div class="orb orb-cyan" style="width:400px;height:400px;top:-100px;right:10%;opacity:0.3;"></div>

  <div class="container-wide" style="position:relative;z-index:1;">
    <?php if ($label): ?>
      <p class="bo-label reveal" style="margin-bottom:1rem;"><?= htmlspecialchars($label) ?></p>
    <?php endif; ?>
    <h1 class="font-display reveal" style="margin-bottom:<?= $sub ? '1.25rem' : '0'; ?>">
      <?= $headline /* allow safe HTML e.g. <br> */ ?>
    </h1>
    <?php if ($sub): ?>
      <p class="reveal reveal-delay-1" style="color:#8E9AAF;font-size:1.1rem;max-width:600px;line-height:1.8;">
        <?= htmlspecialchars($sub) ?>
      </p>
    <?php endif; ?>
  </div>
</section>
<div class="bo-divider" style="opacity:0.5;"></div>

