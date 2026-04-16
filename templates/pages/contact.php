<?php /** @var \ByteOath\Core\View $view */ /** @var array $config */ ?>

<section style="padding:5rem 0 0;position:relative;overflow:hidden;">
  <div class="bg-grid" style="position:absolute;inset:0;opacity:0.4;"></div>
  <div class="orb orb-cyan" style="width:400px;height:400px;top:-100px;right:0;opacity:0.15;"></div>

  <div class="container-wide" style="position:relative;z-index:1;">
    <div style="display:grid;gap:4rem;align-items:start;" class="lg:grid-cols-2">

      <!-- Left: copy -->
      <div>
        <p class="bo-label reveal" style="margin-bottom:1rem;">Contact</p>
        <h1 class="font-display reveal reveal-delay-1" style="margin-bottom:1.25rem;">Let's Talk</h1>
        <p class="reveal reveal-delay-2" style="color:#8E9AAF;line-height:1.8;margin-bottom:2.5rem;">
          Tell us what you're building. We'll tell you if we can help — and be honest if we can't.
        </p>

        <div style="display:flex;flex-direction:column;gap:1.25rem;" class="reveal reveal-delay-2">
          <?php
          $promises = [
            ['⚡', 'Quick response', 'We reply within 1 business day. Usually faster.'],
            ['🔍', 'Honest assessment', "We'll tell you if we're not the right fit."],
            ['📧', 'Direct email', $config['contact_email']],
          ];
          foreach ($promises as [$icon, $label, $text]): ?>
            <div style="display:flex;gap:1rem;align-items:flex-start;">
              <div style="width:36px;height:36px;border-radius:8px;background:rgba(0,212,255,0.1);border:1px solid rgba(0,212,255,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:0.9rem;">
                <?= $icon ?>
              </div>
              <div>
                <strong style="font-size:0.875rem;display:block;margin-bottom:0.2rem;"><?= $label ?></strong>
                <?php if (str_contains($text, '@')): ?>
                  <a href="mailto:<?= $text ?>" class="text-accent" style="font-size:0.825rem;text-decoration:none;"><?= $text ?></a>
                <?php else: ?>
                  <span style="color:#8E9AAF;font-size:0.825rem;"><?= $text ?></span>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right: form -->
      <div class="reveal reveal-delay-1">
        <form id="contact-form" action="/api/contact" method="POST"
              class="bo-card" style="padding:2.5rem;" novalidate>
          <input type="hidden" name="_subject" value="New enquiry — ByteOath">
          <input type="text"   name="_gotcha"  style="display:none;" aria-hidden="true" tabindex="-1">

          <div style="display:grid;gap:1.25rem;">

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
              <div>
                <label class="bo-label-field" for="name">Name <span style="color:#ff6b6b;">*</span></label>
                <input id="name" name="name" type="text" required autocomplete="name"
                       class="bo-input" placeholder="Jane Smith">
              </div>
              <div>
                <label class="bo-label-field" for="email">Email <span style="color:#ff6b6b;">*</span></label>
                <input id="email" name="email" type="email" required autocomplete="email"
                       class="bo-input" placeholder="jane@store.com">
              </div>
            </div>

            <div>
              <label class="bo-label-field" for="company">
                Company / Store URL <span style="color:#8E9AAF;font-weight:400;text-transform:none;letter-spacing:0;">(optional)</span>
              </label>
              <input id="company" name="company" type="text" autocomplete="organization"
                     class="bo-input" placeholder="mystore.com">
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
              <div>
                <label class="bo-label-field" for="platform">Platform</label>
                <select id="platform" name="platform" class="bo-input">
                  <option value="">Select…</option>
                  <option>Shopify</option>
                  <option>Magento 2</option>
                  <option>Both</option>
                  <option>Not sure</option>
                </select>
              </div>
              <div>
                <label class="bo-label-field" for="budget">Budget</label>
                <select id="budget" name="budget" class="bo-input">
                  <option value="">Select…</option>
                  <option>Under €5k</option>
                  <option>€5k – €20k</option>
                  <option>€20k+</option>
                  <option>Ongoing retainer</option>
                  <option>Not sure</option>
                </select>
              </div>
            </div>

            <div>
              <label class="bo-label-field" for="message">Message <span style="color:#ff6b6b;">*</span></label>
              <textarea id="message" name="message" required rows="5"
                        class="bo-input" style="resize:vertical;"
                        placeholder="Tell us what you're working on…"></textarea>
            </div>

            <button type="submit" class="btn-primary" style="justify-content:center;width:100%;padding:1rem;">
              Let's Talk →
            </button>

            <span id="form-message" aria-live="polite"></span>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

