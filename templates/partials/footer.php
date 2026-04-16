<?php /** @var array $config */ ?>
<footer style="background:#111827;border-top:1px solid rgba(0,212,255,0.08);margin-top:6rem;padding:4rem 0 2rem;">
  <div class="container-wide">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

      <!-- Brand -->
      <div>
        <img src="/assets/brand/logo_white.svg" alt="<?= $config['site_name'] ?>" style="height:26px;width:auto;margin-bottom:1rem;">
        <p style="color:#8E9AAF;font-size:0.8rem;line-height:1.7;"><?= $config['tagline'] ?></p>
        <div style="display:flex;gap:1rem;margin-top:1.25rem;">
          <?php if ($config['github_url'] !== '#'): ?>
          <a href="<?= $config['github_url'] ?>" aria-label="GitHub" target="_blank" rel="noopener noreferrer"
             style="color:#8E9AAF;transition:color 0.2s;" class="hover:text-accent">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/></svg>
          </a>
          <?php endif; ?>
          <?php if ($config['linkedin_url'] !== '#'): ?>
          <a href="<?= $config['linkedin_url'] ?>" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer"
             style="color:#8E9AAF;transition:color 0.2s;" class="hover:text-accent">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Services -->
      <div>
        <p class="bo-label mb-4">Services</p>
        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:0.6rem;">
          <li><a href="/services/shopify-apps/" style="color:#8E9AAF;font-size:0.875rem;text-decoration:none;transition:color 0.2s;" class="hover:text-accent">Shopify App Development</a></li>
          <li><a href="/services/magento-2/"   style="color:#8E9AAF;font-size:0.875rem;text-decoration:none;transition:color 0.2s;" class="hover:text-accent">Magento 2 Development</a></li>
          <li><a href="/services/ecommerce-platforms/" style="color:#8E9AAF;font-size:0.875rem;text-decoration:none;transition:color 0.2s;" class="hover:text-accent">Platform Architecture</a></li>
        </ul>
      </div>

      <!-- Company -->
      <div>
        <p class="bo-label mb-4">Company</p>
        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:0.6rem;">
          <li><a href="/about/"   style="color:#8E9AAF;font-size:0.875rem;text-decoration:none;transition:color 0.2s;" class="hover:text-accent">About</a></li>
          <li><a href="/work/"    style="color:#8E9AAF;font-size:0.875rem;text-decoration:none;transition:color 0.2s;" class="hover:text-accent">Work</a></li>
          <li><a href="/contact/" style="color:#8E9AAF;font-size:0.875rem;text-decoration:none;transition:color 0.2s;" class="hover:text-accent">Contact</a></li>
        </ul>
      </div>

      <!-- Legal -->
      <div>
        <p class="bo-label mb-4">Legal</p>
        <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:0.6rem;">
          <li><a href="/privacy-policy/" style="color:#8E9AAF;font-size:0.875rem;text-decoration:none;transition:color 0.2s;" class="hover:text-accent">Privacy Policy</a></li>
        </ul>
      </div>
    </div>

    <div class="bo-divider mb-6"></div>
    <div style="display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:1rem;">
      <p class="mono" style="color:#8E9AAF;font-size:0.75rem;">// Built with AI. Backed by Promise.</p>
      <p style="color:#8E9AAF;font-size:0.75rem;">© <?= date('Y') ?> <?= $config['site_name'] ?>. All rights reserved.</p>
    </div>
  </div>
</footer>

