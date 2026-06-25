# Sukses — Design Guidelines (Borneo Artisans)

## Design Principles

1. **Content-first** — Layout serves the content, never the reverse.
2. **Material 3 palette** — A custom Material Design 3 color system with deep forest greens and warm ochre accents defines the brand.
3. **Accessible by default** — Every choice meets WCAG 2.1 AA (contrast ≥ 4.5:1 for text, ≥ 3:1 for large text).
4. **Fluid everywhere** — Typography and spacing scale smoothly between viewports.
5. **Builder-agnostic** — Consistent look in both Block Editor and Elementor.

## Color Palette (Material 3)

| Token | Hex | Usage |
|---|---|---|
| `primary` | `#061b0e` | Headings, nav text, primary buttons |
| `on-primary` | `#ffffff` | Text on primary backgrounds |
| `primary-container` | `#1b3022` | Accent section backgrounds (carousel) |
| `on-primary-container` | `#819986` | Muted text on primary containers |
| `secondary` | `#7d562d` | Section labels, accent badges |
| `secondary-fixed` | `#ffdcbd` | Light badge backgrounds |
| `secondary-fixed-dim` | `#f0bd8b` | Muted accent |
| `background` | `#fbf9f6` | Page background (warm off-white) |
| `surface` | `#fbf9f6` | Card/form surfaces |
| `surface-container` | `#efeeeb` | Hero background, image placeholders |
| `surface-container-high` | `#e9e8e5` | Footer background |
| `on-surface` | `#1b1c1a` | Body text |
| `on-surface-variant` | `#434843` | Secondary body text, muted labels |
| `outline` | `#737973` | Borders, dividers |
| `outline-variant` | `#c3c8c1` | Subtle borders |

All colors live in `theme.json` (`settings.color.palette`) as the single source of truth. The Tailwind config in `functions.php` mirrors them for utility classes.

## Typography

| Level | Font | Size (fluid) | Weight |
|---|---|---|---|
| `display-lg` | EB Garamond | `clamp(2.5rem, 5vw, 4rem)` | 500 |
| `display-lg-mobile` | EB Garamond | `2.5rem` | 500 |
| `headline-lg` | EB Garamond | `clamp(1.75rem, 3.5vw, 3rem)` | 500 |
| `headline-md` | EB Garamond | `clamp(1.25rem, 2.5vw, 2rem)` | 500 |
| `body-lg` | Hanken Grotesk | `clamp(1rem, 1.5vw, 1.125rem)` | 400 |
| `body-md` | Hanken Grotesk | `1rem` | 400 |
| `label-caps` | Hanken Grotesk | `0.75rem` | 600 (0.1em letter-spacing) |

- **EB Garamond** — display and headline roles (serif, elegant)
- **Hanken Grotesk** — body text and labels (sans-serif, readable)
- Both loaded via Google Fonts in `functions.php`

## Layout

| Metric | Value |
|---|---|
| Content width | 720 px |
| Wide width | 1280 px |
| Section gap | 120 px |
| Desktop margin | 64 px |
| Mobile margin | 20 px |
| Gutter | 24 px |

- Hero is full-viewport split (50/50)
- Content sections are centered with `max-w-container-max` (1280px)
- No sidebar in default layout

## Spacing

- Base unit: 8 px
- Section padding: `clamp(20px, 4vw, 64px)`
- Avoid fixed pixels — use Tailwind's spacing scale or CSS `clamp()`

## Responsive

- Breakpoints: Tailwind defaults (sm: 640px, md: 768px, lg: 1024px, xl: 1280px)
- Hero stacks vertically on mobile (image below text)
- Services grid goes single-column on mobile
- Carousel scrolls horizontally on all sizes

## Accessibility

- Skip-to-content link must be first focusable element
- All interactive elements have visible focus outlines
- Color is never the sole differentiator for state
- Heading hierarchy must be sequential
- Form inputs must have associated `<label>` elements
- Material icons include `aria-hidden="true"` or screen-reader text

## Template Hierarchy

| Template | Purpose |
|---|---|
| `front-page.php` | Landing page — all 4 design sections |
| `page.php` | Standard page — `the_content()` for Elementor |
| `single.php` | Single post — content + comments |
| `index.php` | Blog archive — post grid with pagination |

## When working with AGENTS

- Start by reading DESIGN.md before writing any CSS or templates.
- All visual changes must first go through `theme.json` or the Tailwind config.
- If a design decision contradicts these guidelines, flag it and suggest the compliant alternative.
