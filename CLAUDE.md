# ByteOath — byteoath.com

Read these files for full context before any task:
- `.ai/memory/brand.md`     — colors, fonts, CSS classes, tone
- `.ai/memory/stack.md`     — tech stack, file map, naming conventions
- `.ai/memory/progress.md`  — current status, done, next, decisions

## Quick reference

**Stack:** PHP 8.2 · FastRoute · Tailwind CSS (compiled) · Vanilla JS · SQLite · Nginx + PHP-FPM · Docker

**Front controller:** `public/index.php` — all routes and config live here  
**Controllers:** `src/Controllers/` — extend `ByteOath\Core\Controller`  
**Templates:** `templates/` — `$view` always available, use `$view->include()`  
**CSS source:** `resources/css/input.css` — after changes: `npm run build`

**Brand:** bg `#1A2238` · card `#1E2A42` · accent `#00D4FF` · muted `#8E9AAF` · text `#FFFFFF`

## Skills (step-by-step patterns)
- Add a page → `.ai/skills/add-page.md`
- Add a component → `.ai/skills/add-component.md`
- CSS changes → `.ai/skills/css.md`
- Deploy → `.ai/skills/deploy.md`

## Prompts (ready to use)
- New page → `.ai/prompts/new-page.md`
- New component → `.ai/prompts/new-component.md`
- Fix bug → `.ai/prompts/fix-bug.md`
- Write copy → `.ai/prompts/content.md`

## Rules
- Dark theme only · mobile-first · no jQuery · no CDN CSS at runtime
- Direct, technical, honest tone — no fluff
- After each session: update `.ai/memory/progress.md`

