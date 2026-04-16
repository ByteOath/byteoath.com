# Prompt: New Page

Copy the context block, fill in the blanks, paste into Claude Code or Copilot Chat.

---

## Context block (paste first)
```
Project: ByteOath — byteoath.com
Stack: PHP 8.2, FastRoute (PSR-4: ByteOath\), Tailwind CSS compiled, Vanilla JS, SQLite, Nginx+PHP-FPM, Docker
Brand: bg=#1A2238 card=#1E2A42 accent=#00D4FF muted=#8E9AAF text=#FFFFFF
Fonts: font-display (Montserrat) | font-body (Poppins) | font-mono (Fira Code)
CSS: .bo-card .bo-badge .bo-tag .bo-label .bo-prose .btn-primary .btn-outline .btn-ghost .reveal .reveal-delay-N
Rules: dark theme, no jQuery, mobile-first, direct technical tone
Pattern: read .ai/skills/add-page.md
```

## Prompt template
```
[paste context block above]

Add a new page:
- URL: /[slug]/
- Title: "[Page Title]"
- Description: "[Meta description]"
- Hero label: "[eyebrow]"
- Hero headline: "[H1 — can use <span class='text-accent'>]"
- Hero sub: "[subtitle]"

Sections:
[describe what goes on the page — cards, lists, features, etc.]

Create all 3 steps from .ai/skills/add-page.md.
[Optionally: add to nav / add sub-method to existing controller]
Match existing patterns exactly. Use .reveal + .reveal-delay-N for stagger.
```

