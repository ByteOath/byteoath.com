# General Instructions — ByteOath

These rules apply to ALL AI tools working on this project.

## Non-negotiable rules
1. **Dark theme only** — never use white or light backgrounds on public pages
2. **Mobile-first CSS** — start at 375px, use `md:` / `lg:` breakpoints upward
3. **No jQuery** — vanilla JS or React (blocks only)
4. **No hardcoded hex values** in templates — use CSS class tokens or brand hex values from `.ai/memory/brand.md`
5. **No invented metrics** — use `[PLACEHOLDER]` for unknown numbers
6. **No fake testimonials** — use credibility signals instead
7. **Direct tone** — no fluff, no buzzwords, no padding

## Code style
- PHP: `declare(strict_types=1)`, namespaced under `ByteOath\`, PSR-12
- Templates: `$view` always available — use `$view->include()` for components
- CSS: edit `resources/css/input.css` → `@layer base/components/utilities`, then `npm run build`
- JS: vanilla ES2020, IIFEs, `'use strict'`, no globals

## File change impact
| Change | Action required |
|--------|----------------|
| `templates/**/*.php` | None — instant (bind-mounted) |
| `src/**/*.php` | None — instant (bind-mounted) |
| `public/assets/js/main.js` | None — instant |
| `resources/css/input.css` | `npm run build` |
| `tailwind.config.js` | `npm run build` |
| `docker/Dockerfile` | `docker compose build phpfpm && docker compose up -d` |
| `docker/nginx.conf` | `docker compose restart nginx` |
| `docker-compose.yml` | `docker compose down && docker compose up -d` |

## After any session
Update `.ai/memory/progress.md` with what was done and what is next.

