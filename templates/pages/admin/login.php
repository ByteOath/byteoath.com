<?php /** @var string $error */ ?>
<div class="min-h-screen flex items-center justify-center px-4">
  <div style="width:100%;max-width:400px;">

    <!-- Logo / heading -->
    <div style="text-align:center;margin-bottom:2rem;">
      <img src="/assets/brand/logo_white.svg" alt="ByteOath" style="height:24px;margin:0 auto 1.25rem;">
      <h1 style="font-family:'Montserrat',sans-serif;font-size:1.25rem;font-weight:700;">Admin Panel</h1>
      <p style="color:#8E9AAF;font-size:0.8rem;margin-top:0.25rem;">Sign in to view submissions</p>
    </div>

    <?php if ($error): ?>
      <div style="background:rgba(239,68,68,0.12);border:1px solid rgba(239,68,68,0.3);border-radius:8px;padding:0.75rem 1rem;color:#fca5a5;font-size:0.825rem;margin-bottom:1.25rem;">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="/admin/login"
          style="background:#1E2A42;border:1px solid rgba(0,212,255,0.12);border-radius:12px;padding:2rem;">
      <div style="margin-bottom:1.25rem;">
        <label style="display:block;font-family:'Fira Code',monospace;font-size:0.7rem;letter-spacing:0.08em;text-transform:uppercase;color:#8E9AAF;margin-bottom:0.5rem;">
          Username
        </label>
        <input type="text" name="username" required autocomplete="username"
               class="bo-input" placeholder="admin">
      </div>
      <div style="margin-bottom:1.5rem;">
        <label style="display:block;font-family:'Fira Code',monospace;font-size:0.7rem;letter-spacing:0.08em;text-transform:uppercase;color:#8E9AAF;margin-bottom:0.5rem;">
          Password
        </label>
        <input type="password" name="password" required autocomplete="current-password"
               class="bo-input" placeholder="••••••••">
      </div>
      <button type="submit"
              style="width:100%;padding:0.75rem;border-radius:8px;background:#00D4FF;color:#1A2238;font-family:'Montserrat',sans-serif;font-weight:700;font-size:0.875rem;border:none;cursor:pointer;transition:background 0.2s;"
              onmouseover="this.style.background='#00BADF'" onmouseout="this.style.background='#00D4FF'">
        Sign In
      </button>
    </form>

    <p style="text-align:center;margin-top:1.25rem;">
      <a href="/" style="color:#8E9AAF;font-size:0.775rem;text-decoration:none;"
         onmouseover="this.style.color='#00D4FF'" onmouseout="this.style.color='#8E9AAF'">
        ← Back to site
      </a>
    </p>
  </div>
</div>

