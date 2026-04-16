# Copilot Instructions — ByteOath

## How to activate context
Open these files in editor tabs before chatting — Copilot uses open tabs as context:
- `.ai/memory/brand.md`
- `.ai/memory/stack.md`
- A similar existing file (Controller, template, or CSS section)

## Chat workflow
Use **Copilot Chat** panel (`Ctrl+Shift+I`) or **inline** (`Ctrl+I`).

Always mention the pattern source:
```
Following the pattern in [open file], add [feature].
```

## Inline completion tips
```php
// Describe intent clearly — Copilot completes from context:

// Render page-hero component with label "Blog", headline "Thoughts", sub "eCommerce insights."
<?php $view->include(  // ← Copilot suggests the rest

// 3-column card grid using .bo-card and .reveal + stagger
<div class="  // ← Copilot suggests grid classes
```

## Auto-read file
`.github/copilot-instructions.md` is read automatically.
Edit that file to update Copilot's built-in project context.

