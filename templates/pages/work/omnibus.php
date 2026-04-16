<?php /** @var \ByteOath\Core\View $view */ /** @var array $config */ ?>

<?php $view->include('components/page-hero', [
  'label'    => 'Case Study',
  'headline' => 'Omnibus — EU Price<br><span class="text-accent">Compliance for Shopify</span>',
  'sub'      => 'A live Shopify app that automates the EU Omnibus Directive for merchants.',
]) ?>

<article style="padding:4rem 0;">
  <div class="container-wide">
    <div style="display:grid;gap:3.5rem;" class="lg:grid-cols-3">

      <!-- Main content -->
      <div style="grid-column:span 2;" class="bo-prose">

        <!-- Status badges -->
        <div style="display:flex;flex-wrap:wrap;gap:0.5rem;margin-bottom:2.5rem;">
          <div class="bo-badge"><span class="dot"></span> Live</div>
          <?php foreach (['Shopify App', 'Remix', 'PostgreSQL', 'Fly.io'] as $t): ?>
            <span class="bo-tag"><?= $t ?></span>
          <?php endforeach; ?>
        </div>

        <h2 class="font-display reveal" style="font-size:1.25rem;color:#fff;margin-bottom:1rem;">The Problem</h2>
        <p class="reveal reveal-delay-1">The EU Omnibus Directive requires online merchants to display the lowest price of the last 30 days alongside any promotional price. Doing this manually on a Shopify store — with thousands of SKUs and frequent sales — is impossible without automation.</p>

        <h2 class="font-display reveal" style="font-size:1.25rem;color:#fff;margin:2.5rem 0 1rem;">What We Built</h2>
        <p class="reveal reveal-delay-1">Omnibus is a Shopify app that:</p>
        <ul class="reveal reveal-delay-2">
          <li>Tracks price history for every product variant automatically</li>
          <li>Calculates and displays the correct "prior price" on product pages</li>
          <li>Updates in real-time when prices change</li>
          <li>Requires no theme code — works via Shopify's App Blocks</li>
          <li>Handles edge cases: flash sales, tiered pricing, currency variants</li>
        </ul>

        <h2 class="font-display reveal" style="font-size:1.25rem;color:#fff;margin:2.5rem 0 1rem;">What We Learned</h2>
        <p class="reveal reveal-delay-1">Shopify's App Review process is thorough. We went through <code>[PLACEHOLDER]</code> rounds of review. Key issues: performance impact on storefront, accurate price history across currency markets, and handling merchant uninstall/reinstall gracefully.</p>

      </div>

      <!-- Sidebar -->
      <div class="reveal reveal-delay-2">
        <div class="bo-card" style="padding:2rem;position:sticky;top:5rem;">
          <p class="bo-label" style="margin-bottom:1.25rem;">Tech stack</p>
          <?php foreach ([
            ['Remix', 'Full-stack framework'],
            ['Shopify Admin API', 'Product data'],
            ['Storefront API', 'Storefront display'],
            ['App Bridge', 'Embedded UI'],
            ['Polaris', 'Design system'],
            ['PostgreSQL', 'Price history'],
            ['Fly.io', 'Deployment'],
          ] as [$name, $role]): ?>
            <div style="padding:0.6rem 0;border-bottom:1px solid rgba(255,255,255,0.05);">
              <div class="font-mono" style="font-size:0.8rem;color:#fff;"><?= $name ?></div>
              <div style="font-size:0.725rem;color:#8E9AAF;"><?= $role ?></div>
            </div>
          <?php endforeach; ?>

          <div style="margin-top:1.5rem;display:flex;flex-direction:column;gap:0.75rem;">
            <?php if ($config['app_store_url'] !== '#'): ?>
              <a href="<?= $config['app_store_url'] ?>" class="btn-primary" style="justify-content:center;" target="_blank" rel="noopener">
                View on App Store ↗
              </a>
            <?php endif; ?>
            <a href="/contact/" class="btn-outline" style="justify-content:center;">Build Something Similar</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</article>

<?php $view->include('components/cta-section', [
  'headline' => 'Interested in a Similar App?',
  'sub'      => "We can scope it and tell you what it takes — before a single line is written.",
  'btn_text' => "Let's Talk →",
]) ?>

