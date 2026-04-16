# ByteOath — byteoath.com

> **AI-First. Promise-Backed.**  
> Lean eCommerce dev studio site. PHP 8.2 · Tailwind CSS · SQLite · Nginx · Docker.

---

## Table of Contents

1. [Architecture](#1-architecture)
2. [Project Structure](#2-project-structure)
3. [Local Development](#3-local-development)
4. [Production Deployment](#4-production-deployment)
5. [Adding Pages & Content](#5-adding-pages--content)
6. [Brand & Design System](#6-brand--design-system)
7. [Admin Panel](#7-admin-panel)
8. [AI-First Development](#8-ai-first-development)
9. [Prompting Playbook](#9-prompting-playbook)
10. [GitHub Copilot Workflow](#10-github-copilot-workflow)
11. [Claude Code Workflow](#11-claude-code-workflow)

---

## 1. Architecture

### Stack decision

| Layer | Choice | Why |
|-------|--------|-----|
| Language | PHP 8.2 | Zero runtime overhead, native on every server, no framework lock-in |
| Routing | `nikic/fast-route` | PSR-compatible, lightweight, single dependency |
| Autoloading | Composer PSR-4 | Standard, IDE-friendly, future-proof |
| CSS | Tailwind CSS CLI (compiled) | Utility-first, zero runtime, tree-shaken output |
| JS | Vanilla ES2020 | No framework weight, no dependency drift |
| Database | SQLite (PDO) | Zero setup, portable, swappable to MySQL later |
| Server | Nginx + PHP-FPM | Production-grade, industry standard |
| Containers | Docker Compose | Same environment dev → production |

### Request lifecycle

```
Browser → Nginx (port 3000/80)
         → Static asset?  → serve directly from public/assets/
         → PHP request?   → FastCGI → PHP-FPM (port 9000)
                                    → public/index.php  (front controller)
                                    → Env::load()  →  Config::load()
                                    → Router::dispatch()
                                    → Controller::method()
                                    → View::render(template, vars, layout)
                                    → layouts/base.php wraps page output
                                    → HTML response
```

### MVC-lite pattern

```
Route definition    →  public/index.php
Controller logic    →  src/Controllers/
Template rendering  →  src/Core/View.php
Page templates      →  templates/pages/
Layouts             →  templates/layouts/
Reusable partials   →  templates/partials/   (nav, footer)
Reusable components →  templates/components/ (cta-section, page-hero)
```

---

## 2. Project Structure

```
byteoath.com/
│
├── docker-compose.yml          ← Start here for all environments
├── docker/
│   ├── Dockerfile              ← Multi-stage: Node (CSS build) → PHP-FPM
│   └── nginx.conf              ← Nginx vhost config
│
├── composer.json               ← PHP dependencies (fast-route)
├── package.json                ← Node dev dependencies (tailwindcss)
├── tailwind.config.js          ← Brand colors, fonts, content paths
│
├── resources/
│   └── css/
│       └── input.css           ← EDIT CSS HERE (@layer base/components/utilities)
│
├── public/                     ← Nginx document root (web-accessible only)
│   ├── index.php               ← Front controller: routes + config
│   └── assets/
│       ├── css/
│       │   └── tailwind.css    ← Compiled output (commit, never edit directly)
│       ├── js/
│       │   └── main.js         ← Vanilla JS: nav, scroll-reveal, form, typewriter
│       └── brand/              ← Logo SVGs (mounted from ../assets/brand/)
│
├── src/                        ← PHP source (outside web root)
│   ├── Core/
│   │   ├── Config.php          ← Static config store
│   │   ├── Controller.php      ← Base controller (injects View)
│   │   ├── Database.php        ← PDO SQLite singleton, auto-migrates schema
│   │   ├── Env.php             ← .env file loader (no dependency)
│   │   ├── Router.php          ← FastRoute wrapper
│   │   └── View.php            ← Template renderer (capture/render/partial/include)
│   └── Controllers/
│       ├── HomeController.php
│       ├── AboutController.php
│       ├── ServicesController.php
│       ├── WorkController.php
│       ├── ContactController.php
│       ├── ApiController.php   ← POST /api/contact → SQLite
│       └── AdminController.php ← Session auth, dashboard, delete
│
├── templates/
│   ├── layouts/
│   │   ├── base.php            ← Public layout (head, nav, footer, scripts)
│   │   └── admin.php           ← Admin layout (minimal, noindex)
│   ├── partials/
│   │   ├── nav.php             ← Sticky nav with mobile menu
│   │   └── footer.php          ← 4-column footer
│   ├── components/
│   │   ├── page-hero.php       ← Reusable hero ($label, $headline, $sub)
│   │   └── cta-section.php     ← Reusable CTA ($headline, $sub, $btn_text)
│   └── pages/
│       ├── home.php
│       ├── about.php
│       ├── contact.php
│       ├── 404.php
│       ├── services/  (index, shopify, magento, platforms)
│       ├── work/      (index, omnibus)
│       └── admin/     (login, dashboard)
│
├── assets/
│   └── brand/                  ← Source logos (SVG) — edit here
│       ├── logo_white.svg      ← White version (Byte white, oath cyan)
│       ├── logo_color.svg      ← Color version
│       ├── logo_icon_white.svg ← Icon only
│       └── logo_icon_color.svg ← Icon only, color
│
├── storage/                    ← Runtime (Docker volume, gitignored)
│   └── submissions.sqlite
│
├── .env                        ← Secrets (gitignored — copy from .env.example)
└── .env.example                ← Template — always commit this
```

---

## 3. Local Development

### Prerequisites

- Docker Desktop
- Node 20+ (for CSS watch mode)
- Git

### First-time setup

```bash
# 1. Clone
git clone <repo-url>
cd byteoath.com

# 2. Environment
cp .env.example .env
# Defaults work for local — no edits needed

# 3. Node deps (for CSS)
npm install

# 4. Build CSS
npm run build

# 5. Start Docker
docker compose up -d
```

| URL | What |
|-----|------|
| http://localhost:3000 | Site |
| http://localhost:3000/admin/login | Admin panel |
| http://localhost:3000/contact/ | Contact form |

**Default admin:** `admin` / `ByteOath2024!` — change before going live.

### CSS watch mode (development)

```bash
# Rebuilds tailwind.css automatically on every template/CSS change
npm run dev
```

> PHP template changes take effect instantly (bind-mounted, no restart needed).  
> `src/` PHP changes take effect instantly.  
> `resources/css/input.css` changes need `npm run build` (or use `npm run dev`).  
> `docker/Dockerfile` changes need `docker compose build phpfpm`.

### Docker commands

```bash
docker compose up -d              # start
docker compose down               # stop
docker compose down -v            # stop + wipe DB (full reset)
docker compose logs -f            # all logs
docker compose logs -f phpfpm     # PHP errors only
docker compose logs -f nginx      # Nginx access + errors
docker compose restart nginx      # reload nginx after config change
docker compose exec phpfpm sh     # shell inside PHP-FPM container

# Query SQLite
docker compose exec phpfpm sqlite3 /var/www/html/storage/submissions.sqlite \
  "SELECT * FROM submissions ORDER BY created_at DESC;"
```

### Change admin password

```bash
php -r "echo password_hash('YourNewPassword', PASSWORD_BCRYPT);"
# Copy the output → paste into .env as ADMIN_PASS_HASH
```

---

## 4. Production Deployment

### Option A — Dokploy (recommended self-hosted PaaS)

[Dokploy](https://dokploy.com) manages Docker deployments with Git webhooks, SSL, and reverse proxy.

```
1. Push repo to GitHub / GitLab

2. In Dokploy UI:
   New Application → Docker Compose
   Repo: your repo URL
   Branch: main
   Compose file: docker-compose.yml

3. Environment variables in Dokploy UI:
   SITE_PORT=80
   SITE_URL=https://byteoath.com
   CONTACT_EMAIL=hello@byteoath.com
   ADMIN_USER=admin
   ADMIN_PASS_HASH=<bcrypt hash>
   APP_STORE_URL=https://apps.shopify.com/your-app
   GITHUB_URL=https://github.com/byteoath
   LINKEDIN_URL=https://linkedin.com/company/byteoath

4. Dokploy handles: SSL (Let's Encrypt), reverse proxy (Traefik),
   volume persistence, zero-downtime deploys on git push.
```

**Deploy flow:**
```
git push origin main
  → Dokploy webhook fires
  → docker compose build phpfpm  (Node builds CSS, PHP image built)
  → docker compose up -d         (containers swapped)
```

### Option B — Any VPS (DigitalOcean, Hetzner, Linode, etc.)

```bash
# On the server
git clone <repo-url> /var/www/byteoath.com
cd /var/www/byteoath.com
cp .env.example .env && nano .env   # fill production values

docker compose build
docker compose up -d

# Then configure host Nginx or Caddy to proxy to port 3000
```

**Host Nginx reverse proxy:**

```nginx
server {
    listen 443 ssl http2;
    server_name byteoath.com www.byteoath.com;

    ssl_certificate     /etc/letsencrypt/live/byteoath.com/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/byteoath.com/privkey.pem;

    location / {
        proxy_pass         http://127.0.0.1:3000;
        proxy_set_header   Host              $host;
        proxy_set_header   X-Real-IP         $remote_addr;
        proxy_set_header   X-Forwarded-For   $proxy_add_x_forwarded_for;
        proxy_set_header   X-Forwarded-Proto $scheme;
    }
}
```

**Host Caddy (simpler — auto SSL):**

```caddy
byteoath.com {
    reverse_proxy localhost:3000
}
```

### Option C — GitHub Actions CI/CD

```yaml
# .github/workflows/deploy.yml
name: Deploy to Production

on:
  push:
    branches: [main]

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4

      - uses: actions/setup-node@v4
        with:
          node-version: '20'

      - name: Build CSS
        run: cd byteoath.com && npm ci && npm run build

      - name: Commit compiled CSS
        run: |
          git config user.name "github-actions"
          git config user.email "actions@github.com"
          git add byteoath.com/public/assets/css/tailwind.css
          git diff --staged --quiet || git commit -m "chore: rebuild tailwind.css"

      - name: Deploy via SSH
        uses: appleboy/ssh-action@v1
        with:
          host: ${{ secrets.SERVER_HOST }}
          username: deploy
          key: ${{ secrets.SERVER_SSH_KEY }}
          script: |
            cd /var/www/byteoath.com
            git pull origin main
            docker compose build phpfpm
            docker compose up -d
```

### Production checklist

- [ ] `ADMIN_PASS_HASH` changed from the default
- [ ] `SITE_URL` set to `https://byteoath.com`
- [ ] `CONTACT_EMAIL` set
- [ ] All placeholder URLs filled (`APP_STORE_URL`, `GITHUB_URL`, `LINKEDIN_URL`)
- [ ] SSL certificate active
- [ ] `storage/` volume named (persists across deploys — never `docker compose down -v` in prod)
- [ ] Server firewall: only 80/443 exposed publicly; port 3000 internal only

---

## 5. Adding Pages & Content

### Add a new page — 3 steps

**Example: `/pricing/`**

#### Step 1 — Controller (`src/Controllers/PricingController.php`)

```php
<?php
declare(strict_types=1);
namespace ByteOath\Controllers;
use ByteOath\Core\Controller;

class PricingController extends Controller
{
    public function index(): void
    {
        $this->view->render('pages/pricing', [
            'title'       => 'Pricing',
            'description' => 'Transparent project-based pricing for Shopify and Magento 2 development.',
        ]);
    }
}
```

#### Step 2 — Route (`public/index.php`)

```php
use ByteOath\Controllers\PricingController;

// inside the RouteCollector callback:
$r->get('/pricing',  [PricingController::class, 'index']);
$r->get('/pricing/', [PricingController::class, 'index']);
```

#### Step 3 — Template (`templates/pages/pricing.php`)

```php
<?php /** @var \ByteOath\Core\View $view */ ?>

<?php $view->include('components/page-hero', [
  'label'    => 'Pricing',
  'headline' => 'Honest Pricing',
  'sub'      => 'Project-based. No retainer traps.',
]) ?>

<section style="padding:4rem 0;">
  <div class="container-wide">
    <!-- your content here -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="bo-card reveal" style="padding:2rem;">
        <h3 class="font-display" style="margin-bottom:1rem;">Shopify App</h3>
        <p style="color:#8E9AAF;">From €5,000</p>
      </div>
    </div>
  </div>
</section>

<?php $view->include('components/cta-section', [
  'headline' => 'Get a Quote',
  'sub'      => 'Every project is scoped before we start.',
]) ?>
```

**Add to nav** (optional) — edit `templates/partials/nav.php`:

```php
$navLinks = [
  'Services' => '/services/',
  'Work'     => '/work/',
  'Pricing'  => '/pricing/',   // ← add
  'About'    => '/about/',
];
```

No cache, no restart, no config files. Done.

---

### Reusable components

```php
// Page hero — dark bg, grid texture, animated orb
<?php $view->include('components/page-hero', [
  'label'    => 'Section label',   // mono eyebrow text
  'headline' => 'Main Headline',   // safe HTML allowed (<br>, <span class="text-accent">)
  'sub'      => 'Sub-copy.',
]) ?>

// CTA banner
<?php $view->include('components/cta-section', [
  'headline' => 'Ready to Build?',
  'sub'      => "Tell us what you're working on.",
  'btn_text' => "Let's Talk →",    // optional
  'btn_href' => '/contact/',        // optional
]) ?>
```

### Edit existing content

| What | Where |
|------|-------|
| Page copy / headlines | `templates/pages/*.php` |
| Nav links | `templates/partials/nav.php` |
| Footer columns | `templates/partials/footer.php` |
| Brand colors | `tailwind.config.js` + `resources/css/input.css` → `npm run build` |
| Logos | `assets/brand/` |
| Contact email | `.env` → `CONTACT_EMAIL` |
| Social URLs | `.env` → `GITHUB_URL`, `LINKEDIN_URL` |
| App Store link | `.env` → `APP_STORE_URL` |
| Admin credentials | `.env` → `ADMIN_USER`, `ADMIN_PASS_HASH` |

---

## 6. Brand & Design System

### Colors

| Token | Hex | Usage |
|-------|-----|-------|
| Primary / BG | `#1A2238` | Page background, hero, dark sections |
| Card | `#1E2A42` | Card backgrounds, nav |
| Accent | `#00D4FF` | CTAs, links, badges — "AI First" colour |
| Accent Dark | `#00A8CC` | Hover states |
| Muted | `#8E9AAF` | Secondary text, descriptions, labels |
| Text | `#FFFFFF` | Primary text on dark backgrounds |

### Typography

| Role | Font | Tailwind class |
|------|------|----------------|
| H1 / Logo | Montserrat Bold 700 | `font-display` |
| H2 / Section | Montserrat SemiBold 600 | `font-display` |
| Body / UI | Poppins Regular 400 | `font-body` |
| Mono / Data | Fira Code 400 | `font-mono` |

### Component classes

```
.bo-card          dark card, accent border on hover, lift on hover
.bo-badge         pill badge with animated pulse dot
.bo-tag           mono tech tag (stack labels)
.bo-label         small uppercase mono eyebrow label
.bo-label-field   form field label
.bo-prose         body text + bullet list styling
.bo-divider       gradient horizontal rule (cyan centre)
.bo-input         dark form input with accent focus ring
.bg-grid          subtle cyan dot-grid background texture
.orb / .orb-cyan / .orb-blue   decorative gradient blur orbs
.glow-accent      cyan box-shadow glow
.text-glow        cyan text-shadow glow
.btn-primary      solid cyan button
.btn-outline      bordered ghost button
.btn-ghost        text link with animated arrow
.reveal           scroll-reveal element (progressive — needs JS)
.reveal-delay-1   +80ms stagger
.reveal-delay-2   +160ms stagger
.reveal-delay-3   +240ms stagger
.float            floating up/down keyframe animation (6s)
.float-slow       same, 9s
.nav-active       active nav link colour
```

### Adding new CSS

```css
/* resources/css/input.css */
@layer components {
  .my-new-component {
    background: #1E2A42;
    border: 1px solid rgba(0, 212, 255, 0.12);
    /* ... */
  }
}
```

Then: `npm run build`

---

## 7. Admin Panel

| Route | What |
|-------|------|
| `/admin/login` | Login form |
| `/admin/` | Submissions table (requires auth) |
| `/admin/logout` | Clears session |
| `/admin/delete?id=N` | Deletes submission |

**Schema** (`storage/submissions.sqlite`):

```sql
CREATE TABLE submissions (
  id         INTEGER PRIMARY KEY AUTOINCREMENT,
  name       TEXT    NOT NULL,
  email      TEXT    NOT NULL,
  company    TEXT,
  platform   TEXT,
  budget     TEXT,
  message    TEXT    NOT NULL,
  ip         TEXT,
  created_at DATETIME DEFAULT (datetime('now'))
);
```

### Migrate to MySQL later

Only `src/Core/Database.php` changes — swap the DSN:

```php
// Current (SQLite)
$dsn = "sqlite:{$storagePath}/submissions.sqlite";

// Future (MySQL)
$dsn = "mysql:host=db;dbname=byteoath;charset=utf8mb4";
$pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS'], [...]);
```

All queries use prepared statements — zero other changes needed.

---

## 8. AI-First Development

ByteOath uses AI throughout the development cycle. This section documents the approach so every future session — human-led or AI-led — stays consistent.

### The memory problem

AI models have no memory between sessions. Solve this with **committed context files**:

```
byteoath.com/
  README.md          ← Architecture, workflows, prompts (this file)
  CLAUDE.md          ← Short context for Claude Code (auto-read on startup)
  COPILOT.md         ← Short context for Copilot chat sessions
  progress.md        ← What's done, what's next, decisions made
```

**Rule:** Update `progress.md` at the end of every build session.  
**Rule:** Never start an AI session on content without providing brand context.  
**Rule:** Keep working prompts in this README so they can be reused and improved.

### Principles

1. **AI writes code, humans make decisions** — AI handles boilerplate, patterns, repetition. Humans decide architecture, UX, and what to build next.
2. **Context in = quality out** — generic prompts → generic output. Brand-aware prompts → on-brand output. Always paste the context block.
3. **Review before commit** — treat AI output as a first draft. Read it, understand it, commit it deliberately.
4. **Small focused sessions** — one feature per session. Long sessions accumulate context drift.
5. **AI for speed, judgment for correctness** — use AI to move fast, use your brain to check business logic, security, and edge cases.

---

## 9. Prompting Playbook

### Master context block (paste at the start of every session)

```
Project: ByteOath — byteoath.com
Stack: PHP 8.2, FastRoute (PSR-4: ByteOath\), Tailwind CSS (compiled), Vanilla JS, SQLite, Nginx + PHP-FPM, Docker

Architecture:
- public/index.php = front controller (Env load + Config load + routes)
- src/Controllers/ = one class per resource, extends Controller
- templates/pages/ = page templates ($view always available)
- templates/components/ = reusable ($view->include('components/name', [...]))
- resources/css/input.css = CSS source (@layer base / components / utilities)
- After CSS changes: npm run build

Brand:
- Background: #1A2238  Card: #1E2A42  Accent: #00D4FF  Muted: #8E9AAF  Text: #FFFFFF
- H1/H2: Montserrat (font-display)  Body: Poppins (font-body)  Mono: Fira Code (font-mono)
- CSS components: .bo-card .bo-badge .bo-tag .bo-label .bo-prose .btn-primary .btn-outline .btn-ghost
- Scroll-reveal: class="reveal" (+ reveal-delay-1/2/3 for stagger)

Rules:
- Full dark theme — no white/light section backgrounds
- Mobile-first, no jQuery, no external CSS beyond fonts
- Content tone: direct, technical, honest — no fluff, no invented metrics
- All inline style colors must use brand hex values only
```

---

### Prompt: Add a new page

```
[paste master context]

Add a new page to byteoath.com:

Page URL: /[slug]/
Page title: "[Title]"
Meta description: "[Description]"
Hero label: "[small eyebrow]"
Hero headline: "[H1 text]"
Hero sub: "[subtitle]"

Content sections:
[describe what goes on the page]

Create:
1. src/Controllers/[Name]Controller.php with index() method
2. GET routes in public/index.php (with and without trailing slash)
3. templates/pages/[slug].php using page-hero and cta-section components
4. [Optionally] add to nav in templates/partials/nav.php

Match existing patterns exactly. Use .bo-card for cards, .reveal + .reveal-delay-N for scroll animation.
```

---

### Prompt: Add a service sub-page

```
[paste master context]

Add a new service page to byteoath.com:

URL: /services/[slug]/
Title: "[Service Name]"
Headline: "[H1]"
Sub: "[subtitle]"

What we cover (bullet list):
- [item 1]
- [item 2]
- [item 3]

Tech stack sidebar items: [tech1, tech2, tech3, ...]
Sidebar CTA button text: "[Start a ... Project]"
Bottom CTA headline: "[Question]"
Bottom CTA sub: "[one-liner]"

Add method [camelCaseName]() to ServicesController.php.
Register GET routes in public/index.php.
Create template following templates/pages/services/shopify.php exactly.
```

---

### Prompt: Edit page content

```
[paste master context]

Update [page] (templates/pages/[path].php):

Changes:
- Change headline to: "[new headline]"
- Change sub to: "[new sub]"
- Add section: [describe section, content, layout]
- Remove section: [describe what to remove]

Keep all other sections unchanged. Match existing dark-theme card style.
```

---

### Prompt: New reusable component

```
[paste master context]

Create a new reusable component:

File: templates/components/[name].php
Variables: $[var1] (type), $[var2] (type), ...

Design:
- [describe the visual design using brand tokens]
- Use .bo-card for the container
- Use .reveal class for scroll animation
- [any other requirements]

Then show example usage: $view->include('components/[name]', [...])
```

---

### Prompt: Fix a bug

```
[paste master context]

Bug in byteoath.com:

Error:
[paste full error message]

File: [filename]
Expected: [what should happen]
Actual: [what is happening]

Diagnose the root cause and fix it. Show only the changed lines with before/after context.
```

---

### Prompt: CSS / design change

```
[paste master context]

CSS change needed:

File: resources/css/input.css
[Describe the change]

Rules:
- Use @layer components for component styles, @layer utilities for single-purpose helpers
- Use only brand colors: #1A2238 #1E2A42 #00D4FF #8E9AAF #FFFFFF
- No hardcoded values outside brand tokens
- Remind me to run: npm run build after the change
```

---

### Prompt: Write page copy (content)

```
Brand context:
- Company: ByteOath — AI-First eCommerce dev studio
- Tagline: AI-First. Promise-Backed.
- Specialisms: Shopify apps, Magento 2, eCommerce platform architecture
- Tone: direct, technical, honest — no fluff, no buzzwords, no invented metrics
- Voice: we're engineers talking to merchants and other engineers
- What we are NOT: an agency, a portfolio site, a content farm
- Primary CTA always: "Let's Talk" → /contact/
- No fake testimonials. No made-up stats.

Write copy for: [page or section]
Requirements:
- [specific requirements]
- Max [N] words per paragraph
- [tone notes]
```

---

## 10. GitHub Copilot Workflow

### Setup

Create `.github/copilot-instructions.md` in the project root (Copilot reads this automatically):

```markdown
# Copilot Instructions — ByteOath / byteoath.com

## Project
PHP 8.2 website. PSR-4 namespace `ByteOath\`. FastRoute routing.
Tailwind CSS compiled from resources/css/input.css → public/assets/css/tailwind.css.

## Patterns
- Controllers extend `ByteOath\Core\Controller`, use `$this->view->render()`
- Templates receive `$view` automatically — use `$view->include('components/name', [...])`
- Routes registered in `public/index.php` inside RouteCollector callback
- CSS: edit resources/css/input.css, then run npm run build

## CSS classes (do not invent new utility classes)
.bo-card .bo-badge .bo-tag .bo-label .bo-label-field .bo-prose .bo-divider
.bo-input .bg-grid .orb .orb-cyan .glow-accent .text-glow
.btn-primary .btn-outline .btn-ghost
.reveal .reveal-delay-1 .reveal-delay-2 .reveal-delay-3
.float .float-slow .nav-active .container-wide .container-content

## Brand colors (inline styles only)
bg=#1A2238  card=#1E2A42  accent=#00D4FF  muted=#8E9AAF  text=#FFFFFF

## Rules
- No jQuery. No hardcoded hex values outside brand tokens.
- Dark theme only. Mobile-first.
- Tone: direct, technical, honest. No fluff.
```

### Copilot chat workflow

**Open relevant files before chatting** — Copilot uses open editor tabs as context.

```
# Adding a new Controller → open an existing one first
# Adding a new template  → open a similar template first
# Writing CSS            → open tailwind.config.js + input.css first
```

**Useful Copilot chat prompts:**

```
# New controller method
"Following the pattern in the open files, add a method pricing() that renders templates/pages/pricing.php"

# New template section
"Add a 3-column card section using .bo-card and .reveal classes, following the pattern in the open template"

# CSS component
"Add a .bo-stat component to input.css for displaying a large number (2.5rem, accent color) with a label below (muted). Use @layer components."

# Fix
"The open file has this error: [error]. Fix it following the same patterns as the rest of the file."
```

### Copilot inline completion tips

```php
// Copilot learns from comments — be descriptive:

// Render the page hero with label "Services", headline "What We Build", sub "We go deep, not wide."
<?php $view->include( // Copilot will suggest the rest

// Build a 3-column services grid with .bo-card, .reveal, and .reveal-delay-N stagger
<div class=" // Copilot suggests the grid classes
```

---

## 11. Claude Code Workflow

### Setup

```bash
npm install -g @anthropic-ai/claude-code
cd byteoath.com
claude
```

Claude Code auto-reads `CLAUDE.md`. Create it:

```bash
cat > CLAUDE.md << 'EOF'
# ByteOath — byteoath.com

PHP 8.2 site. PSR-4 (ByteOath\). nikic/fast-route. Tailwind CSS compiled.
Nginx + PHP-FPM via Docker Compose.

Document root: public/. Front controller: public/index.php (routes + Config).
Controllers: src/Controllers/. Templates: templates/. CSS source: resources/css/input.css.

Brand: bg=#1A2238 card=#1E2A42 accent=#00D4FF muted=#8E9AAF text=#FFFFFF.
Fonts: Montserrat (font-display), Poppins (font-body), Fira Code (font-mono).
Components: .bo-card .bo-badge .bo-tag .bo-label .bo-prose .btn-primary .btn-outline .reveal.

After CSS changes: npm run build
After Dockerfile changes: docker compose build phpfpm && docker compose up -d
PHP/template changes: instant (bind-mounted).
EOF
```

### Session workflow

```bash
# Start fresh
claude

# Good session openers — always reference CLAUDE.md:
"Read CLAUDE.md then add a /pricing page following the same 3-step pattern as the services pages."
"Read CLAUDE.md then fix this PHP error: [paste error]"
"Read CLAUDE.md then read templates/pages/home.php and add a testimonials section after the tech stack."
"Read CLAUDE.md, read src/Core/Database.php, then add an email notification when a submission is saved."
```

### Multi-file feature sessions

```bash
# Tell Claude the full scope upfront and confirm each step:
"Read CLAUDE.md.

I want to add a simple blog. Scope:
1. BlogController (index + show methods)
2. Routes in public/index.php
3. templates/pages/blog/index.php — list of posts
4. templates/pages/blog/post.php — single post
5. posts table in Database.php (id, slug, title, body, published_at)

Complete step 1 only and wait for me to confirm before continuing."
```

### Keeping context across sessions

**End of every session — ask Claude:**

```
"Update CLAUDE.md with what we built today.
Add a summary line to progress.md marking these items done and listing what's next."
```

Commit the updated files. Next session starts with full context.

### `progress.md` template

```markdown
# Progress

## Done
- [x] Core routing + PSR-4 architecture
- [x] All public pages (home, about, services, work, contact)
- [x] Contact form → SQLite + admin panel
- [x] Tailwind CSS build pipeline (multi-stage Docker)
- [x] Scroll-reveal animations (progressive enhancement)
- [x] Custom brand scrollbar
- [x] Docker Compose (phpfpm + nginx + db_storage volume)

## In Progress
- [ ] ...

## Next
- [ ] Email notification on form submission (PHPMailer or SMTP API)
- [ ] Blog / case studies section
- [ ] MySQL migration (when volume justifies)
- [ ] OG image generation

## Decisions
- SQLite chosen for zero-ops simplicity; PDO abstraction makes MySQL swap trivial
- No JS framework — vanilla ES2020 is sufficient; reduces dependency risk
- CSS compiled at Docker build time — no runtime overhead, no CDN dependency
- Progressive enhancement for scroll-reveal — content always visible without JS
```

---

## Quick Reference

```bash
# ── Daily development ──────────────────────────────────────────────────────────
npm run dev                           # CSS watch mode
docker compose up -d                  # start Docker
docker compose logs -f phpfpm         # watch PHP errors

# ── After CSS changes ──────────────────────────────────────────────────────────
npm run build                         # compile Tailwind

# ── After Dockerfile changes ───────────────────────────────────────────────────
docker compose build phpfpm && docker compose up -d

# ── Add a page (3 steps) ───────────────────────────────────────────────────────
# 1. src/Controllers/MyController.php
# 2. Route in public/index.php
# 3. templates/pages/my-page.php

# ── Production deploy ──────────────────────────────────────────────────────────
git push origin main                  # auto-deploy if Dokploy/CI configured

# ── Admin ──────────────────────────────────────────────────────────────────────
# http://localhost:3000/admin/login   (default: admin / ByteOath2024!)
php -r "echo password_hash('newpass', PASSWORD_BCRYPT);"  # generate new hash

# ── SQLite ─────────────────────────────────────────────────────────────────────
docker compose exec phpfpm sqlite3 /var/www/html/storage/submissions.sqlite \
  ".mode column" ".headers on" "SELECT * FROM submissions;"
```

