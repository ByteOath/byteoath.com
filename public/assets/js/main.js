// ByteOath — main.js | Vanilla JS, no dependencies

'use strict';

// ── Mobile nav ────────────────────────────────────────────────────────────────
(function () {
  const btn  = document.getElementById('nav-toggle');
  const menu = document.getElementById('mobile-menu');
  if (!btn || !menu) return;

  btn.addEventListener('click', () => {
    const open = menu.classList.toggle('open');
    btn.setAttribute('aria-expanded', String(open));
    btn.querySelector('.icon-open').classList.toggle('hidden', open);
    btn.querySelector('.icon-close').classList.toggle('hidden', !open);
  });

  document.addEventListener('click', e => {
    if (!btn.contains(e.target) && !menu.contains(e.target)) {
      menu.classList.remove('open');
      btn.setAttribute('aria-expanded', 'false');
      btn.querySelector('.icon-open').classList.remove('hidden');
      btn.querySelector('.icon-close').classList.add('hidden');
    }
  });
})();

// ── Scroll-reveal (IntersectionObserver) ─────────────────────────────────────
(function () {
  // Signal to CSS that JS is running — activates the hidden state on .reveal
  document.body.classList.add('js-ready');

  if (!('IntersectionObserver' in window)) {
    // No observer support — just show everything immediately
    document.querySelectorAll('.reveal').forEach(el => el.classList.add('visible'));
    return;
  }

  const obs = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        obs.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0,                    // trigger as soon as 1px is visible
    rootMargin: '0px 0px -30px 0px' // slight offset from bottom edge
  });

  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
})();

// ── Nav: highlight active link ────────────────────────────────────────────────
(function () {
  const path = window.location.pathname.replace(/\/$/, '') || '/';
  document.querySelectorAll('[data-nav-link]').forEach(link => {
    const href = link.getAttribute('href').replace(/\/$/, '') || '/';
    const isActive = href === path || (href !== '' && href !== '/' && path.startsWith(href));
    if (isActive) {
      link.classList.add('nav-active');
    }
  });
})();

// ── Contact form (async → /api/contact) ──────────────────────────────────────
(function () {
  const form = document.getElementById('contact-form');
  if (!form) return;

  form.addEventListener('submit', async e => {
    e.preventDefault();
    const btn     = form.querySelector('[type="submit"]');
    const msgEl   = document.getElementById('form-message');
    const origTxt = btn.textContent;

    btn.disabled     = true;
    btn.textContent  = 'Sending…';
    msgEl.textContent = '';
    msgEl.className  = '';

    try {
      const res  = await fetch(form.action, {
        method:  'POST',
        body:    new FormData(form),
        headers: { Accept: 'application/json' },
      });
      const data = await res.json();

      if (data.ok) {
        form.reset();
        msgEl.textContent = '✓ ' + (data.message ?? "Message sent — we'll reply within 1 business day.");
        msgEl.className   = 'text-accent font-mono text-sm mt-4 block';
      } else {
        throw new Error(data.error ?? 'Unknown error');
      }
    } catch (err) {
      msgEl.textContent = '⚠ ' + (err.message || 'Something went wrong. Email us at hello@byteoath.com');
      msgEl.className   = 'text-red-400 text-sm mt-4 block';
    } finally {
      btn.disabled    = false;
      btn.textContent = origTxt;
    }
  });
})();

// ── Typewriter effect on hero headline ────────────────────────────────────────
(function () {
  const el = document.getElementById('hero-typewriter');
  if (!el) return;
  const words = el.dataset.words ? JSON.parse(el.dataset.words) : [];
  if (!words.length) return;

  let wi = 0, ci = 0, deleting = false;
  const TYPE_SPEED = 80, DELETE_SPEED = 40, PAUSE = 1800;

  function tick() {
    const word = words[wi];
    el.textContent = deleting ? word.slice(0, ci--) : word.slice(0, ci++);

    if (!deleting && ci > word.length) {
      deleting = true;
      setTimeout(tick, PAUSE);
      return;
    }
    if (deleting && ci < 0) {
      deleting = false;
      wi = (wi + 1) % words.length;
      ci = 0;
    }
    setTimeout(tick, deleting ? DELETE_SPEED : TYPE_SPEED);
  }
  tick();
})();

