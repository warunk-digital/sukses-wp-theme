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
├── style.css          Theme header + base reset
├── index.php          Main loop — calls the_content() for Elementor canvas
├── header.php         DOCTYPE, wp_head(), body_class()
├── footer.php         wp_footer() close
├── functions.php      Theme setup, supports, menus, enqueue
├── theme.json         Block editor presets (v3)
├── AGENTS.md          This file
├── templates/         FSE block templates
├── parts/             FSE template parts
└── screenshot.png     Theme thumbnail (1200×900)
```

## Developing

- Use `ddev wp` from the project root for WP-CLI commands
- Add block patterns in `patterns/`
- Add style variations in `styles/`
- Keep `theme.json` as the single source of truth for design tokens

## Guidelines

1. Do not edit WordPress core or plugin files.
2. Add theme features through `functions.php` — never by patching core.
3. `the_content()` must remain in the loop templates — Elementor hooks into it.
4. Keep `header.php` and `footer.php` lean — Elementor Theme Builder may
   override them entirely.
5. Test every change with both the Block Editor and Elementor active.
