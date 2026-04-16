<?php /** @var \ByteOath\Core\View $view */ ?>

<?php $view->include('components/page-hero', [
  'label'    => 'Services / Magento 2',
  'headline' => 'Magento 2<br><span class="text-accent">Development</span>',
  'sub'      => 'Custom modules. Clean code. No cowboy patches.',
]) ?>

<section style="padding:4rem 0;">
  <div class="container-wide">
    <div style="display:grid;gap:4rem;" class="lg:grid-cols-5">
      <div style="grid-column:span 3;">
        <div class="bo-prose">
          <p>Magento 2 is a powerful platform that punishes shortcuts. We write properly namespaced modules, follow DI patterns, and don't hack core.</p>
          <p>Our code is testable, documented, and ready for the next developer who touches it.</p>
        </div>

        <h2 class="font-display reveal" style="font-size:1.25rem;margin:2.5rem 0 1.25rem;">What we cover</h2>
        <ul class="bo-prose reveal reveal-delay-1">
          <li>Custom module development (service contracts, repositories, plugins)</li>
          <li>Third-party API integrations (ERPs, PIMs, payment gateways, logistics)</li>
          <li>Performance audits — full-page cache, Varnish, slow query diagnosis</li>
          <li>Magento 2 upgrades &amp; migrations (2.x → 2.4.x, CE → EE)</li>
          <li>GraphQL API extensions for headless front-ends</li>
          <li>GDPR / EU compliance modules</li>
        </ul>
      </div>

      <div style="grid-column:span 2;" class="reveal reveal-delay-2">
        <div class="bo-card" style="padding:2rem;position:sticky;top:5rem;">
          <p class="bo-label" style="margin-bottom:1.25rem;">Tech stack</p>
          <?php foreach (['PHP 8.2', 'Magento 2.4+', 'GraphQL', 'Varnish', 'MySQL', 'Elasticsearch', 'Docker'] as $t): ?>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:0.6rem 0;border-bottom:1px solid rgba(255,255,255,0.05);">
              <span class="font-mono" style="font-size:0.8rem;color:#8E9AAF;"><?= $t ?></span>
              <span class="text-accent" style="font-size:0.7rem;">✓</span>
            </div>
          <?php endforeach; ?>
          <div style="margin-top:1.5rem;">
            <a href="/contact/" class="btn-primary" style="width:100%;justify-content:center;">Start a Magento Project</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $view->include('components/cta-section', [
  'headline' => 'Magento 2 Project in Scope?',
  'sub'      => "We're honest about complexity. Let's scope it together before you commit.",
]) ?>

