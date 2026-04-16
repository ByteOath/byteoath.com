<?php /** @var \ByteOath\Core\View $view */ ?>

<?php $view->include('components/page-hero', [
  'label'    => 'Services / Shopify',
  'headline' => 'Shopify App<br><span class="text-accent">Development</span>',
  'sub'      => 'We build apps that pass App Store review, handle real merchant volume, and stay maintainable.',
]) ?>

<section style="padding:4rem 0;">
  <div class="container-wide">
    <div style="display:grid;gap:4rem;" class="lg:grid-cols-5">
      <div style="grid-column:span 3;">
        <div class="bo-prose">
          <p>We've shipped a live Shopify app (Omnibus — EU Compliance). We know the submission process, the review pitfalls, and the Shopify API surface that matters for production apps.</p>
          <p>We don't build throwaway prototypes. We build apps you can maintain, update, and grow.</p>
        </div>

        <h2 class="font-display reveal" style="font-size:1.25rem;margin:2.5rem 0 1.25rem;">What we cover</h2>
        <ul class="bo-prose reveal reveal-delay-1">
          <li>Full-stack app development with Remix + Shopify CLI</li>
          <li>Shopify Functions &amp; Extensions (discounts, shipping, payments)</li>
          <li>App Store submissions — review prep, listing copy, compliance checks</li>
          <li>Embedded app UI with Polaris</li>
          <li>Billing API — subscription models, usage charges, trials</li>
          <li>Webhook reliability — delivery guarantees, retry logic</li>
          <li>OAuth + session management</li>
        </ul>
      </div>

      <div style="grid-column:span 2;" class="reveal reveal-delay-2">
        <div class="bo-card" style="padding:2rem;position:sticky;top:5rem;">
          <p class="bo-label" style="margin-bottom:1.25rem;">Tech stack</p>
          <?php foreach (['Remix', 'Shopify CLI', 'Shopify Functions', 'Polaris', 'Billing API', 'App Bridge', 'PostgreSQL'] as $t): ?>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:0.6rem 0;border-bottom:1px solid rgba(255,255,255,0.05);">
              <span class="font-mono" style="font-size:0.8rem;color:#8E9AAF;"><?= $t ?></span>
              <span class="text-accent" style="font-size:0.7rem;">✓</span>
            </div>
          <?php endforeach; ?>
          <div style="margin-top:1.5rem;">
            <a href="/contact/" class="btn-primary" style="width:100%;justify-content:center;">Start a Shopify Project</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $view->include('components/cta-section', [
  'headline' => 'Have a Shopify App Idea?',
  'sub'      => "We'll scope it and tell you what it takes — before a single line is written.",
]) ?>

