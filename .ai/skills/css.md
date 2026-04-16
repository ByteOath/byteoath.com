# Skill: CSS Changes

## Where to edit
```
resources/css/input.css   ← ONLY edit this file
```
Never edit `public/assets/css/tailwind.css` directly — it is compiled output.

## Layer system
```css
/* Base — HTML elements, resets, body, headings */
@layer base {
  .my-element { ... }
}

/* Components — multi-property reusable classes */
@layer components {
  .bo-my-component {
    background: #1E2A42;
    border: 1px solid rgba(0, 212, 255, 0.12);
    border-radius: 12px;
  }
}

/* Utilities — single-purpose helpers */
@layer utilities {
  .my-utility { ... }
}
```

## After every CSS edit
```bash
npm run build          # one-time build
# OR
npm run dev            # watch mode (rebuilds on save)
```

## Brand token reference
```css
/* backgrounds */
#1A2238   /* primary bg */
#1E2A42   /* card bg */
#111827   /* darker section bg */

/* text */
#FFFFFF   /* primary text */
#8E9AAF   /* muted text */
#00D4FF   /* accent text */

/* borders */
rgba(0, 212, 255, 0.12)   /* subtle accent border */
rgba(0, 212, 255, 0.35)   /* hover accent border */
rgba(255, 255, 255, 0.1)  /* subtle white border */

/* shadows */
0 8px 32px rgba(0, 212, 255, 0.1)   /* card hover glow */
0 0 20px rgba(0, 212, 255, 0.15)    /* accent glow */
```

