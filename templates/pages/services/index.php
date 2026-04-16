<?php /** @var \ByteOath\Core\View $view */ ?>

<?php $view->include('components/page-hero', [
  'label'    => 'Services',
  'headline' => 'What We Build',
  'sub'      => 'We specialise in two platforms. We go deep, not wide.',
]) ?>

<section style="padding:4rem 0;">
  <div class="container-wide">
    <div style="display:grid;grid-template-columns:1fr;gap:1.5rem;" class="md:grid-cols-3">
      <?php
      $services = [
        [
          'num'   => '01',
          'title' => 'Shopify App Development',
          'body'  => 'We build apps for the Shopify App Store and private merchant installs. From idea to submission.',
          'features' => ['App Store submissions', 'Shopify Functions & Extensions', 'Custom billing models', 'Webhook architecture'],
          'tags'  => ['Remix', 'Polaris', 'Billing API'],
          'href'  => '/services/shopify-apps/',
          'cta'   => 'See Shopify Services',
        ],
        [
          'num'   => '02',
          'title' => 'Magento 2 Development',
          'body'  => 'Custom modules, third-party integrations, and performance work for complex Magento 2 stores.',
          'features' => ['Custom module development', 'Third-party integrations', 'Performance audits', 'Upgrade & migration'],
          'tags'  => ['PHP 8.2', 'GraphQL', 'GDPR'],
          'href'  => '/services/magento-2/',
          'cta'   => 'See Magento 2 Services',
        ],
        [
          'num'   => '03',
          'title' => 'Platform Architecture',
          'body'  => 'When you need more than a theme — headless, composable, API-first builds from the ground up.',
          'features' => ['Headless commerce', 'Composable architecture', 'API-first design', 'Platform migrations'],
          'tags'  => ['Next.js', 'Algolia', 'Remix'],
          'href'  => '/services/ecommerce-platforms/',
          'cta'   => 'See Platform Services',
        ],
      ];
      foreach ($services as $i => $s): ?>
        <div class="bo-card reveal reveal-delay-<?= $i+1 ?>" style="padding:2rem;display:flex;flex-direction:column;">
          <span class="font-mono text-accent" style="font-size:0.7rem;margin-bottom:1rem;opacity:0.6;"><?= $s['num'] ?></span>
          <h3 class="font-display" style="font-size:1.05rem;margin-bottom:0.75rem;"><?= $s['title'] ?></h3>
          <p style="color:#8E9AAF;font-size:0.875rem;line-height:1.7;margin-bottom:1.25rem;"><?= $s['body'] ?></p>
          <ul style="list-style:none;padding:0;margin:0 0 1.5rem;flex:1;">
            <?php foreach ($s['features'] as $f): ?>
              <li style="display:flex;align-items:flex-start;gap:0.6rem;margin-bottom:0.6rem;font-size:0.825rem;color:#8E9AAF;">
                <span class="text-accent" style="flex-shrink:0;margin-top:1px;">✓</span><?= $f ?>
              </li>
            <?php endforeach; ?>
          </ul>
          <div style="display:flex;flex-wrap:wrap;gap:0.4rem;margin-bottom:1.25rem;">
            <?php foreach ($s['tags'] as $t): ?>
              <span class="bo-tag"><?= $t ?></span>
            <?php endforeach; ?>
          </div>
          <a href="<?= $s['href'] ?>" class="btn-ghost"><?= $s['cta'] ?> →</a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php $view->include('components/cta-section') ?>

