# Brand Memory — ByteOath

## Colors
| Token       | Hex       | Usage                                  |
|-------------|-----------|----------------------------------------|
| Primary/BG  | `#1A2238` | Page background, hero, dark sections   |
| Card        | `#1E2A42` | Card bg, nav bg                        |
| Accent      | `#00D4FF` | CTAs, links, badges — "AI First" color |
| Accent Dark | `#00A8CC` | Hover states                           |
| Muted       | `#8E9AAF` | Secondary text, labels, descriptions   |
| Text        | `#FFFFFF` | Primary text on dark backgrounds       |

## Typography
| Role        | Font       | Weight       | Class          |
|-------------|------------|--------------|----------------|
| H1 / Logo   | Montserrat | 700          | `font-display` |
| H2 / Section| Montserrat | 600          | `font-display` |
| Body / UI   | Poppins    | 400 / 500    | `font-body`    |
| Mono / Data | Fira Code  | 400          | `font-mono`    |

## Component CSS classes
```
.bo-card          dark card, accent border + lift on hover
.bo-badge         pill badge with animated pulse dot
.bo-tag           mono tech/stack tag
.bo-label         small uppercase mono eyebrow label
.bo-label-field   form field label
.bo-prose         body text + styled bullet list
.bo-divider       gradient horizontal rule (cyan centre)
.bo-input         dark form input with accent focus ring
.bg-grid          subtle cyan dot-grid texture
.orb .orb-cyan .orb-blue   decorative gradient blur orbs
.glow-accent      cyan box-shadow glow
.text-glow        cyan text-shadow glow
.btn-primary      solid cyan button (#00D4FF, dark text)
.btn-outline      bordered ghost button
.btn-ghost        text link with animated arrow gap
.container-wide   max-width 1200px, centered, responsive padding
.container-content max-width 760px, centered
```

## Animation classes
```
.reveal           scroll-reveal element — progressive (JS adds js-ready to body first)
.reveal-delay-1   +80ms stagger
.reveal-delay-2   +160ms stagger
.reveal-delay-3   +240ms stagger
.float            floating keyframe (6s loop)
.float-slow       floating keyframe (9s loop)
.nav-active       active nav link color (#00D4FF)
```

## Voice & tone
- Direct, technical, honest
- No fluff, no buzzwords, no invented metrics
- Engineers talking to merchants and other engineers
- Primary CTA always: "Let's Talk" → /contact/
- No fake testimonials. Use [PLACEHOLDER] for unknown numbers.
- We are NOT an agency, NOT a portfolio — a product-minded dev studio

