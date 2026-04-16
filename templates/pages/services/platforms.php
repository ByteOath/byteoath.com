<?php /** @var \ByteOath\Core\View $view */ ?>

<?php $view->include('components/page-hero', [
  'label'    => 'Services / Platforms',
  'headline' => 'Platform<br><span class="text-accent">Architecture</span>',
  'sub'      => "When off-the-shelf isn't enough.",
]) ?>

<section style="padding:4rem 0;">
  <div class="container-wide">
    <div style="display:grid;gap:4rem;" class="lg:grid-cols-5">
      <div style="grid-column:span 3;">
        <div class="bo-prose">
          <p>Some merchant problems outgrow a standard Shopify or Magento setup. When that happens, you need someone who understands the full stack — not just the theme layer.</p>
          <p>We scope first. We tell you what's realistic before we start building.</p>
        </div>

        <h2 class="font-display reveal" style="font-size:1.25rem;margin:2.5rem 0 1.25rem;">What we cover</h2>
        <ul class="bo-prose reveal reveal-delay-1">
          <li>Headless commerce architecture (Remix, Next.js on Shopify/Magento backends)</li>
          <li>Composable eCommerce — selecting and connecting best-of-breed services</li>
          <li>API-first design — building for integrations from day one</li>
          <li>Platform migrations — Shopify ↔ Magento ↔ custom</li>
          <li>Multi-store, multi-currency, multi-region setups</li>
          <li>Search infrastructure (Algolia, Elasticsearch)</li>
        </ul>
      </div>

      <div style="grid-column:span 2;" class="reveal reveal-delay-2">
        <div class="bo-card" style="padding:2rem;position:sticky;top:5rem;">
          <p class="bo-label" style="margin-bottom:1.25rem;">Tech stack</p>
          <?php foreach (['Remix / Next.js', 'Shopify Storefront API', 'Magento GraphQL', 'Algolia', 'Contentful / Sanity', 'Vercel / Fly.io', 'Stripe'] as $t): ?>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:0.6rem 0;border-bottom:1px solid rgba(255,255,255,0.05);">
              <span class="font-mono" style="font-size:0.8rem;color:#8E9AAF;"><?= $t ?></span>
              <span class="text-accent" style="font-size:0.7rem;">✓</span>
            </div>
          <?php endforeach; ?>
          <div style="margin-top:1.5rem;">
            <a href="/contact/" class="btn-primary" style="width:100%;justify-content:center;">Discuss Architecture</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $view->include('components/cta-section', [
  'headline' => 'Outgrowing Your Platform?',
  'sub'      => "Let's talk about what's holding you back — we'll scope it honestly.",
]) ?>

