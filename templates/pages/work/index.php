<?php /** @var \ByteOath\Core\View $view */ /** @var array $config */ ?>

<?php $view->include('components/page-hero', [
  'label'    => 'Work',
  'headline' => "What We've Shipped",
  'sub'      => 'Our track record is small and real. Here\'s what\'s live.',
]) ?>

<section style="padding:4rem 0;">
  <div class="container-wide">

    <!-- Omnibus card -->
    <div class="bo-card reveal" style="padding:2.5rem;margin-bottom:1.5rem;position:relative;overflow:hidden;">
      <!-- Subtle orb -->
      <div class="orb orb-cyan" style="width:250px;height:250px;top:-80px;right:-60px;opacity:0.2;"></div>

      <div style="display:grid;gap:2.5rem;position:relative;z-index:1;" class="lg:grid-cols-3">
        <div style="grid-column:span 2;">
          <div style="display:flex;flex-wrap:wrap;gap:0.5rem;align-items:center;margin-bottom:1.25rem;">
            <div class="bo-badge"><span class="dot"></span> Live on App Store</div>
            <span class="bo-tag">Shopify App</span>
          </div>
          <h2 class="font-display" style="font-size:1.5rem;margin-bottom:0.75rem;">
            Omnibus — EU Price Compliance
          </h2>
          <p style="color:#8E9AAF;line-height:1.8;margin-bottom:1.25rem;font-size:0.9rem;">
            EU Omnibus Directive requires merchants to show the lowest price of the last 30 days before promotional discounts. We built a Shopify app that automates this — tracking price history, updating displays, and keeping merchants compliant without manual work.
          </p>
          <div style="display:flex;flex-wrap:wrap;gap:0.4rem;margin-bottom:1.5rem;">
            <?php foreach (['Remix', 'Shopify API', 'Polaris', 'PostgreSQL', 'Fly.io'] as $t): ?>
              <span class="bo-tag"><?= $t ?></span>
            <?php endforeach; ?>
          </div>
          <div style="display:flex;flex-wrap:wrap;gap:1rem;">
            <a href="/work/omnibus/" class="btn-primary">Read Case Study →</a>
            <?php if ($config['app_store_url'] !== '#'): ?>
              <a href="<?= $config['app_store_url'] ?>" class="btn-outline" target="_blank" rel="noopener">View on App Store ↗</a>
            <?php endif; ?>
          </div>
        </div>
        <div>
          <p class="bo-label" style="margin-bottom:1rem;">At a glance</p>
          <?php
          $facts = [
            ['Platform', 'Shopify'],
            ['Category', 'EU Compliance'],
            ['Status', '✓ Live'],
            ['Framework', 'Remix'],
            ['Database', 'PostgreSQL'],
          ];
          foreach ($facts as [$k, $v]): ?>
            <div style="display:flex;justify-content:space-between;padding:0.6rem 0;border-bottom:1px solid rgba(255,255,255,0.05);font-size:0.825rem;">
              <span style="color:#8E9AAF;"><?= $k ?></span>
              <span style="color:<?= $k === 'Status' ? '#00D4FF' : '#fff' ?>"><?= $v ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Coming soon -->
    <div class="reveal reveal-delay-1" style="border:1px dashed rgba(0,212,255,0.2);border-radius:12px;padding:2rem;text-align:center;">
      <p style="color:#8E9AAF;font-size:0.875rem;margin:0 0 0.75rem;">More apps in development. We build in public where we can.</p>
      <?php if ($config['github_url'] !== '#'): ?>
        <a href="<?= $config['github_url'] ?>" class="btn-ghost" target="_blank" rel="noopener">Follow on GitHub ↗</a>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php $view->include('components/cta-section', [
  'headline' => 'Want to Be Next?',
  'sub'      => "Tell us what you're building. We'll scope it honestly.",
]) ?>

