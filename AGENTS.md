# Agent Notes

## Scope
- This repo is a Paymenter/Filament theme plugin forked from the Nord theme; the work is to replace the Nordic look with the Ruxora logo/color palette.
- The effective theme wiring is split between `plugin.json`, `src/NordThemePlugin.php`, and `resources/css/theme.css`.
- There are no local package, Composer, build, lint, or test scripts in this repo; verify changes in the host Paymenter panel/theme build.

## Theme Wiring
- `NordThemePlugin::register()` loads `plugins/ruxora-theme/resources/css/theme.css`; the deployed plugin directory must be exactly `ruxora-theme` on case-sensitive Linux filesystems.
- `plugin.json` uses `id: "ruxora-theme"`; `NordThemePlugin::getId()` must return the same id or `php artisan p:plugin:install` can list the plugin but fail lookup.
- `theme.css` imports Filament's theme CSS with `@import '../../../../vendor/filament/filament/resources/css/theme.css';`, so it expects to be compiled from inside the host panel plugin location.
- Existing selectors are Filament utility classes (`.fi-*`) using Tailwind `@apply` and `@theme`; preserve that style unless replacing a whole pattern.

## Brand Palette
- Target light mode: primary `hsl(341, 88%, 63%)`, secondary `hsl(338, 88%, 80%)`, border/accent `hsl(330, 25%, 90%)`, text `hsl(222, 22%, 10%)`, muted text `hsl(222, 12%, 35%)`, inverted text `hsl(0, 0%, 100%)`, background `hsl(0, 0%, 100%)`, secondary background `hsl(330, 60%, 98%)`.
- Target dark mode: primary `hsl(341, 88%, 63%)`, secondary `hsl(338, 88%, 80%)`, border/accent `hsl(330, 12%, 18%)`, text `hsl(0, 0%, 100%)`, muted text `hsl(330, 10%, 76%)`, inverted text `hsl(222, 22%, 10%)`, background `hsl(324, 18%, 8%)`, secondary background `hsl(324, 16%, 12%)`.
- Replace Nord hexes and `polarnight` naming when touching related CSS/PHP color definitions; do not introduce new blue/green Nord accents unless intentionally kept for status colors.

## Verification
- After CSS or palette changes, check both `preview-light.png` and `preview-dark.png` expectations manually in the host panel; this repo has no automated screenshot generation.
- If changing the PHP color palette, verify Filament color keys still include `gray`, `primary`, `secondary`, `info`, `success`, `warning`, and `danger` because `theme.css` references `primary-*` and `secondary-*` utilities.
