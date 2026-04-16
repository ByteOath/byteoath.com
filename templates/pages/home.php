<?php /** @var \ByteOath\Core\View $view */ /** @var array $config */ ?>

<!-- ── HERO ────────────────────────────────────────────────────────────────── -->
<section style="min-height:90vh;display:flex;align-items:center;position:relative;overflow:hidden;padding:5rem 0;">
  <!-- Grid texture -->
  <div class="bg-grid" style="position:absolute;inset:0;"></div>

  <!-- Orbs -->
  <div class="orb orb-cyan float" style="width:500px;height:500px;top:-100px;right:-100px;"></div>
  <div class="orb orb-blue float-slow" style="width:350px;height:350px;bottom:-80px;left:-80px;"></div>

  <!-- Geometric shapes -->
  <svg style="position:absolute;right:5%;top:15%;opacity:0.06;pointer-events:none;" width="320" height="320" viewBox="0 0 320 320" fill="none">
    <rect x="10" y="10" width="300" height="300" rx="20" stroke="#00D4FF" stroke-width="1.5"/>
    <rect x="40" y="40" width="240" height="240" rx="12" stroke="#00D4FF" stroke-width="1"/>
    <rect x="70" y="70" width="180" height="180" rx="8" stroke="#00D4FF" stroke-width="0.5"/>
    <line x1="10" y1="160" x2="310" y2="160" stroke="#00D4FF" stroke-width="0.5"/>
    <line x1="160" y1="10" x2="160" y2="310" stroke="#00D4FF" stroke-width="0.5"/>
  </svg>

  <div class="container-wide" style="position:relative;z-index:1;width:100%;">
    <div style="max-width:780px;">

      <!-- Badge -->
      <div class="bo-badge reveal" style="margin-bottom:1.5rem;">
        <span class="dot"></span>
        AI-First. Promise-Backed.
      </div>

      <!-- Headline -->
      <h1 class="font-display reveal reveal-delay-1" style="margin-bottom:1.25rem;line-height:1.08;">
        eCommerce Dev<br>
        <span class="text-accent text-glow">That Ships.</span>
      </h1>

      <!-- Typewriter sub -->
      <p class="reveal reveal-delay-2" style="font-size:1.15rem;color:#8E9AAF;max-width:560px;line-height:1.8;margin-bottom:2.5rem;">
        Shopify apps. Magento 2 platforms. Built with
        <span id="hero-typewriter" class="text-accent font-mono"
              data-words='["AI precision.","merchant insight.","clean code.","production standards."]'>
          AI precision.
        </span>
      </p>

      <!-- CTAs -->
      <div class="reveal reveal-delay-3" style="display:flex;flex-wrap:wrap;gap:1rem;align-items:center;">
        <a href="/contact/" class="btn-primary">Let's Talk →</a>
        <a href="/work/"    class="btn-outline">See Our Work</a>
      </div>

    </div>
  </div>
</section>

<!-- ── POSITIONING STRIP ──────────────────────────────────────────────────── -->
<section style="padding:4rem 0;background:#111827;border-top:1px solid rgba(0,212,255,0.07);border-bottom:1px solid rgba(0,212,255,0.07);">
  <div class="container-wide">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php
      $pillars = [
        ['icon' => '◈', 'title' => 'Deep Platform Knowledge', 'body' => 'We do Shopify and Magento 2 exceptionally well. That focus means fewer surprises, faster delivery.'],
        ['icon' => '⟁', 'title' => 'AI-Augmented Delivery', 'body' => 'AI moves us faster and catches more edge cases — without removing the human judgment that protects your business.'],
        ['icon' => '▣', 'title' => 'Built for Merchant Growth', 'body' => 'Code is a means, not an end. We build tools that grow revenue, reduce friction, and keep customers compliant.'],
      ];
      foreach ($pillars as $i => $p): ?>
        <div class="reveal reveal-delay-<?= $i+1 ?>" style="display:flex;gap:1rem;align-items:flex-start;">
          <span class="text-accent font-mono" style="font-size:1.5rem;margin-top:2px;flex-shrink:0;"><?= $p['icon'] ?></span>
          <div>
            <h3 class="font-display" style="font-size:1rem;margin-bottom:0.5rem;"><?= $p['title'] ?></h3>
            <p style="color:#8E9AAF;font-size:0.875rem;line-height:1.7;margin:0;"><?= $p['body'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── SERVICES CARDS ─────────────────────────────────────────────────────── -->
<section style="padding:5rem 0;">
  <div class="container-wide">
    <div style="margin-bottom:3rem;">
      <p class="bo-label reveal" style="margin-bottom:0.75rem;">What We Build</p>
      <h2 class="font-display reveal reveal-delay-1">From App to Platform</h2>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php
      $services = [
        [
          'num'   => '01',
          'title' => 'Shopify App Development',
          'body'  => 'Apps that pass App Store review, handle real merchant volume, and stay maintainable. From idea to submission.',
          'tags'  => ['Remix', 'Shopify CLI', 'Polaris', 'Billing API'],
          'href'  => '/services/shopify-apps/',
        ],
        [
          'num'   => '02',
          'title' => 'Magento 2 Development',
          'body'  => 'Custom modules, third-party integrations, and performance work for complex Magento 2 stores. Clean code, no cowboy patches.',
          'tags'  => ['PHP 8.2', 'DI', 'GraphQL', 'GDPR'],
          'href'  => '/services/magento-2/',
        ],
        [
          'num'   => '03',
          'title' => 'Platform Architecture',
          'body'  => 'Headless, composable, API-first — when standard Shopify or Magento setups aren\'t enough for your merchant needs.',
          'tags'  => ['Headless', 'Composable', 'Migrations', 'Algolia'],
          'href'  => '/services/ecommerce-platforms/',
        ],
      ];
      foreach ($services as $i => $s): ?>
        <a href="<?= $s['href'] ?>" class="bo-card reveal reveal-delay-<?= $i+1 ?>"
           style="display:flex;flex-direction:column;padding:2rem;text-decoration:none;color:inherit;">
          <span class="font-mono text-accent" style="font-size:0.7rem;margin-bottom:1rem;opacity:0.6;"><?= $s['num'] ?></span>
          <h3 class="font-display" style="font-size:1.05rem;margin-bottom:0.75rem;"><?= $s['title'] ?></h3>
          <p style="color:#8E9AAF;font-size:0.875rem;line-height:1.7;flex:1;margin:0 0 1.5rem;"><?= $s['body'] ?></p>
          <div style="display:flex;flex-wrap:wrap;gap:0.4rem;margin-bottom:1.25rem;">
            <?php foreach ($s['tags'] as $t): ?>
              <span class="bo-tag"><?= $t ?></span>
            <?php endforeach; ?>
          </div>
          <span class="btn-ghost">View service</span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── OMNIBUS SPOTLIGHT ──────────────────────────────────────────────────── -->
<section style="padding:5rem 0;background:#111827;border-top:1px solid rgba(0,212,255,0.07);">
  <div class="container-wide">
    <div style="display:grid;grid-template-columns:1fr;gap:3rem;align-items:center;" class="lg:grid-cols-2">

      <!-- Text -->
      <div>
        <div class="bo-badge reveal" style="margin-bottom:1.5rem;">
          <span class="dot"></span> Live on App Store
        </div>
        <h2 class="font-display reveal reveal-delay-1" style="margin-bottom:1rem;">
          Our First App<br><span class="text-accent">Is Live</span>
        </h2>
        <p class="reveal reveal-delay-2" style="color:#8E9AAF;line-height:1.8;margin-bottom:0.75rem;font-weight:500;">
          Omnibus — EU Compliance for Shopify
        </p>
        <p class="reveal reveal-delay-2" style="color:#8E9AAF;line-height:1.8;margin-bottom:2rem;">
          EU price transparency rules are complex. We simplified them. Omnibus tracks price history and keeps Shopify merchants compliant — automatically.
        </p>
        <div class="reveal reveal-delay-3" style="display:flex;flex-wrap:wrap;gap:1rem;">
          <a href="/work/omnibus/" class="btn-primary">See Case Study →</a>
          <?php if ($config['app_store_url'] !== '#'): ?>
            <a href="<?= $config['app_store_url'] ?>" class="btn-outline" target="_blank" rel="noopener">App Store ↗</a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Visual card -->
      <div class="reveal reveal-delay-2" style="position:relative;">
        <div class="bo-card glow-accent" style="padding:2rem;position:relative;overflow:hidden;">
          <div style="position:absolute;top:0;right:0;width:120px;height:120px;background:radial-gradient(circle,rgba(0,212,255,0.12),transparent 70%);pointer-events:none;"></div>
          <p class="bo-label" style="margin-bottom:1.5rem;">app overview</p>
          <?php
          $features = [
            'Price history tracking — every variant',
            'Correct "prior price" on product pages',
            'Real-time updates on price change',
            'Zero theme code — App Blocks only',
            'Edge case handling: flash sales, currency',
          ];
          foreach ($features as $f): ?>
            <div style="display:flex;align-items:flex-start;gap:0.75rem;margin-bottom:0.875rem;">
              <span class="text-accent" style="flex-shrink:0;margin-top:1px;">✓</span>
              <span style="color:#8E9AAF;font-size:0.875rem;"><?= $f ?></span>
            </div>
          <?php endforeach; ?>
          <div class="bo-divider" style="margin:1.25rem 0;"></div>
          <div style="display:flex;flex-wrap:wrap;gap:0.4rem;">
            <?php foreach (['Remix', 'Shopify API', 'Polaris', 'PostgreSQL', 'Fly.io'] as $t): ?>
              <span class="bo-tag"><?= $t ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ── WHY US / TRUST SIGNALS ─────────────────────────────────────────────── -->
<section style="padding:5rem 0;">
  <div class="container-wide">
    <div style="text-align:center;margin-bottom:3rem;">
      <p class="bo-label reveal" style="margin-bottom:0.75rem;">Why ByteOath</p>
      <h2 class="font-display reveal reveal-delay-1">The Balance Others Miss</h2>
      <p class="reveal reveal-delay-2" style="color:#8E9AAF;max-width:520px;margin:1rem auto 0;">
        AI speed without business judgment is dangerous. We bring both.
      </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      <?php
      $trust = [
        ['val' => 'AI+', 'label' => 'AI-augmented workflow', 'sub' => 'Faster delivery, more edge cases caught'],
        ['val' => '⚖',   'label' => 'Business-first thinking', 'sub' => 'Revenue, compliance, maintainability'],
        ['val' => '🔒',  'label' => 'Security & GDPR', 'sub' => 'EU compliance built-in, not bolted-on'],
        ['val' => '↗',   'label' => 'Merchant growth focus', 'sub' => 'Code that grows revenue, not just ships'],
      ];
      foreach ($trust as $i => $t): ?>
        <div class="bo-card reveal reveal-delay-<?= $i+1 ?>" style="padding:1.75rem;text-align:center;">
          <div style="font-size:1.75rem;margin-bottom:0.75rem;"><?= $t['val'] ?></div>
          <div class="font-display" style="font-size:0.9rem;margin-bottom:0.4rem;"><?= $t['label'] ?></div>
          <p style="color:#8E9AAF;font-size:0.775rem;margin:0;line-height:1.6;"><?= $t['sub'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── TECH STACK ──────────────────────────────────────────────────────────── -->
<section style="padding:3rem 0;background:#111827;border-top:1px solid rgba(0,212,255,0.07);">
  <div class="container-wide" style="text-align:center;">
    <p class="bo-label reveal" style="margin-bottom:1.25rem;">Production stack</p>
    <div class="reveal reveal-delay-1" style="display:flex;flex-wrap:wrap;justify-content:center;gap:0.5rem;">
      <?php foreach (['PHP 8.2', 'Remix', 'React', 'Shopify CLI', 'Polaris', 'Magento 2', 'PostgreSQL', 'Fly.io', 'Docker', 'GitHub Actions'] as $t): ?>
        <span class="bo-tag"><?= $t ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ── BOTTOM CTA ──────────────────────────────────────────────────────────── -->
<?php $view->include('components/cta-section', [
  'headline' => 'Ready to Build?',
  'sub'      => "Tell us what you're working on. We'll tell you if we can help — and be honest if we can't.",
]) ?>

