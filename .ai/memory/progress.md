# Progress — ByteOath

_Update this file at the end of every build session._

---

## Status: Active development

## Done ✅
- [x] Core PSR-4 architecture (Config, Env, View, Router, Controller base, Database)
- [x] FastRoute routing with front controller pattern
- [x] All public pages: home, about, services (index + shopify + magento + platforms), work (index + omnibus), contact
- [x] Contact form → async JS fetch → `/api/contact` → SQLite
- [x] Admin panel `/admin/` — bcrypt session auth, submissions table, delete row
- [x] Tailwind CSS build pipeline — compiled (not CDN), multi-stage Docker, 14KB output
- [x] Custom CSS via `@layer` in `resources/css/input.css`
- [x] Scroll-reveal animations — progressive enhancement (`js-ready` body class, IntersectionObserver)
- [x] Typewriter effect on hero subheadline
- [x] Custom brand scrollbar — primary colour family, opacity variants
- [x] Docker Compose: `phpfpm` (php:8.2-fpm-alpine + pdo_sqlite) + `nginx` (alpine)
- [x] Named volume `db_storage`, network `site_net`
- [x] `.env` / `.env.example` pattern
- [x] `.gitignore` (vendor, node_modules, .env, *.sqlite)
- [x] README.md — full architecture + deployment + AI workflow guide
- [x] `.ai/` memory framework (brand, stack, progress, instructions, skills, prompts)
- [x] `.github/copilot-instructions.md` for Copilot auto-context
- [x] `CLAUDE.md` root entry-point for Claude Code

## In Progress 🔄
- [ ] —

## Next 📋
- [ ] Email notification on form submission (Mailgun API / SMTP via env)
- [ ] Privacy policy page (`/privacy-policy/`)
- [ ] Sitemap.xml generation (`/sitemap.xml`)
- [ ] Blog / case studies (slug-based, SQLite posts table or flat Markdown)
- [ ] OG image meta tags
- [ ] MySQL migration (when volume justifies — only `Database.php` DSN changes)

---

## Architecture decisions log

| Decision | Rationale |
|----------|-----------|
| SQLite over MySQL | Zero ops for low volume; PDO abstraction makes future swap trivial (one line) |
| No JS framework | Vanilla ES2020 sufficient; eliminates dependency churn risk |
| Tailwind CLI, not CDN | No runtime overhead, no browser warning, 14KB vs 3MB |
| CSS compiled in Docker multi-stage | Always fresh on deploy; no Node tooling required on server |
| Progressive enhancement for scroll-reveal | Content always visible even if JS fails or is slow |
| `js-ready` body class pattern | Separates CSS animation state from JS — prevents flash of invisible content |
| Committed `tailwind.css` | Docker bind-mount shadows image files; committed file always present |
| `db_storage` named volume | SQLite survives container rebuilds; never `docker compose down -v` in prod |
| `.ai/` framework for memory | AI models have no session memory — structured context files solve this |

