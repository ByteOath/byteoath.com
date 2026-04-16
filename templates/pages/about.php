<?php /** @var \ByteOath\Core\View $view */ ?>

<?php $view->include('components/page-hero', [
  'label'    => 'About',
  'headline' => 'No Office. No Overhead.<br><span class="text-accent">Just Results.</span>',
  'sub'      => 'ByteOath is a lean startup — a small, focused team of eCommerce engineers. You work directly with the people building your product.',
]) ?>

<section style="padding:4rem 0;">
  <div class="container-wide">
    <div style="display:grid;grid-template-columns:1fr;gap:4rem;" class="lg:grid-cols-2">

      <!-- Human Judgment -->
      <div>
        <h2 class="font-display reveal" style="margin-bottom:1.25rem;">
          Human Judgment.<br><span class="text-accent">AI Speed.</span>
        </h2>
        <div class="bo-prose reveal reveal-delay-1">
          <p>We use AI throughout our workflow — code generation, code review, and edge case discovery. But we don't outsource decisions to models.</p>
          <p>Business context, architecture choices, and client priorities stay with us. AI handles the tedious; we handle the thinking.</p>
        </div>
      </div>

      <!-- What we care about -->
      <div class="reveal reveal-delay-2">
        <p class="bo-label" style="margin-bottom:1.25rem;">What we care about</p>
        <div class="bo-card" style="padding:1.75rem;">
          <?php
          $values = [
            ['Merchant growth', 'Not just shipping code — tools that grow revenue.'],
            ['Honest scoping', 'We tell you what\'s hard before we start.'],
            ['Maintainability', 'Code the next developer can understand and extend.'],
            ['EU/GDPR compliance', 'Security and compliance built in, not bolted on.'],
          ];
          foreach ($values as $v): ?>
            <div style="display:flex;gap:1rem;align-items:flex-start;margin-bottom:1.25rem;">
              <span class="text-accent" style="flex-shrink:0;margin-top:3px;">▸</span>
              <div>
                <strong style="font-size:0.9rem;display:block;margin-bottom:0.2rem;"><?= $v[0] ?></strong>
                <span style="color:#8E9AAF;font-size:0.825rem;"><?= $v[1] ?></span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>

    <!-- Tech Stack -->
    <div style="margin-top:4rem;">
      <p class="bo-label reveal" style="margin-bottom:1rem;">Our stack <span style="color:#8E9AAF;font-style:normal;font-size:0.7rem;">(full transparency)</span></p>
      <div class="reveal reveal-delay-1" style="display:flex;flex-wrap:wrap;gap:0.5rem;">
        <?php foreach (['PHP 8.2', 'Magento 2', 'React', 'Remix', 'Shopify CLI', 'Polaris', 'Claude', 'Git', 'Docker', 'CI/CD', 'PostgreSQL', 'Fly.io'] as $t): ?>
          <span class="bo-tag"><?= $t ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php $view->include('components/cta-section', [
  'headline' => 'Work directly with us.',
  'sub'      => 'No account managers. No handoffs. You talk to the engineers building your product.',
]) ?>

