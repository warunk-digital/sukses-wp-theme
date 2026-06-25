# Sukses — Hybrid WordPress Theme

Works with the WordPress Block Editor (FSE / Full Site Editing) and Elementor side by side.

## Architecture

Hybrid mode uses `add_theme_support( 'block-template-parts' )` so WordPress keeps
the PHP template fallback (`index.php`, `header.php`, `footer.php`) alive even
when FSE is active. This is what allows Elementor's Theme Builder to override
headers, footers, and single templates without fighting the block system.

| Builder        | Templates used                      |
|----------------|-------------------------------------|
| Block Editor   | `theme.json`, `templates/*.html`    |
| Elementor      | `header.php`, `footer.php`, `index.php` / `page.php` / `single.php` |

## File structure

```
sukses/
├── style.css          Theme header (Tailwind handles all styling)
├── index.php          Blog archive — post grid with pagination
├── front-page.php     Landing page — hero, services, carousel, contact
├── page.php           Standard page — the_content() for Elementor
├── single.php         Single post — content + comments
├── header.php         DOCTYPE, wp_head(), body_class()
├── footer.php         Footer + wp_footer() close
├── functions.php      Theme setup, enqueues (Tailwind CDN, fonts, config)
├── theme.json         Block editor presets (v3) — color palette, typography
├── AGENTS.md          This file
├── DESIGN.md          Design guidelines
├── .gitignore         Git ignore rules
├── screenshot.png     Theme thumbnail (1200×900)
├── templates/         FSE block templates
└── parts/             FSE template parts
```

## Design

Read **[DESIGN.md](./DESIGN.md)** before writing any CSS or templates. It defines
typography, color palette, spacing, layout, responsive rules, and accessibility
standards. `theme.json` is the single source of truth for design tokens.

## Developing

- Use `ddev wp` from the project root for WP-CLI commands
- Add block patterns in `patterns/`
- Add style variations in `styles/`
- Keep `theme.json` as the single source of truth for design tokens
- See DESIGN.md for visual guidelines agents must follow

## Guidelines

1. Do not edit WordPress core or plugin files.
2. Add theme features through `functions.php` — never by patching core.
3. `the_content()` must remain in the loop templates — Elementor hooks into it.
4. Keep `header.php` and `footer.php` lean — Elementor Theme Builder may
   override them entirely.
5. Test every change with both the Block Editor and Elementor active.
6. Read DESIGN.md before proposing any visual change.
