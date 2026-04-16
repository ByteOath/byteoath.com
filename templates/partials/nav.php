<?php /** @var array $config */ ?>
<nav class="bo-nav" aria-label="Main navigation">
  <div class="container-wide">
    <div style="display:flex;align-items:center;justify-content:space-between;height:76px;">

      <!-- Logo -->
      <a href="/" aria-label="<?= $config['site_name'] ?> home" style="display:flex;align-items:center;flex-shrink:0;">
        <img src="/assets/brand/logo_white.svg" alt="<?= $config['site_name'] ?>" style="height:44px;width:auto;">
      </a>

      <!-- Desktop links -->
      <ul style="display:flex;align-items:center;gap:2rem;list-style:none;margin:0;padding:0;" class="hidden md:flex text-sm">
        <?php
        $navLinks = [
          'Services' => '/services/',
          'Work'     => '/work/',
          'About'    => '/about/',
        ];
        foreach ($navLinks as $label => $href): ?>
          <li>
            <a href="<?= $href ?>"
               data-nav-link
               class="text-white/70 hover:text-accent transition-colors font-body text-sm [&.nav-active]:text-accent">
              <?= $label ?>
            </a>
          </li>
        <?php endforeach; ?>
        <li>
          <a href="/contact/" class="btn-primary text-xs py-2.5 px-5" style="font-size:0.8rem;">
            Let's Talk →
          </a>
        </li>
      </ul>

      <!-- Mobile toggle -->
      <button id="nav-toggle" aria-controls="mobile-menu" aria-expanded="false"
              class="md:hidden p-2 text-white/70 hover:text-accent transition-colors"
              aria-label="Toggle menu">
        <svg class="icon-open w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg class="icon-close w-5 h-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <!-- Mobile menu -->
    <div id="mobile-menu" role="navigation" aria-label="Mobile navigation">
      <ul style="list-style:none;margin:0;padding:0 0 1rem;" class="flex flex-col gap-1 text-sm">
        <?php foreach ($navLinks as $label => $href): ?>
          <li>
            <a href="<?= $href ?>" data-nav-link
               class="block px-3 py-2.5 rounded-lg text-white/70 hover:text-accent hover:bg-white/5 transition-colors [&.nav-active]:text-accent">
              <?= $label ?>
            </a>
          </li>
        <?php endforeach; ?>
        <li class="pt-2">
          <a href="/contact/" class="btn-primary justify-center" style="font-size:0.8rem;">Let's Talk →</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

