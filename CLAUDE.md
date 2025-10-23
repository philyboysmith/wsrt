# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is the Western Sussex Rivers Trust website, built on Statamic CMS (v5.49) with Laravel 10 and Statamic Peak as the starter kit. The site uses a flat-file content management system with optional Git integration for content versioning.

## Key Technologies

- **Statamic CMS 5.49**: Flat-file Laravel-based CMS
- **Laravel 10**: PHP framework
- **Statamic Peak**: Starter kit providing the base structure
- **Alpine.js 3.13**: Frontend reactivity
- **Tailwind CSS 3.4**: Utility-first CSS framework
- **Vite 5**: Frontend build tool

## Development Commands

### Initial Setup
```bash
composer install
php please make:user
npm i && npm run dev
```

### Daily Development
```bash
npm run dev              # Start Vite dev server with HMR
npm run watch            # Alias for dev
npm run build            # Production build
npm run production       # Alias for build
```

### Statamic CLI (via `please` command)
```bash
php please make:user                    # Create new user
php please cache:clear                  # Clear all caches
php please stache:warm                  # Warm the Statamic cache
php please static:clear                 # Clear static cache
php please static:warm                  # Warm static cache
php please search:update --all          # Update search indexes
```

### Laravel Artisan
```bash
php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan queue:restart
```

### Testing
```bash
vendor/bin/phpunit                      # Run all tests
vendor/bin/phpunit --testsuite=Unit     # Unit tests only
vendor/bin/phpunit --testsuite=Feature  # Feature tests only
```

### Code Quality
```bash
vendor/bin/pint                         # Laravel Pint code formatting
```

## Architecture

### Content Structure

Content is file-based and stored in `content/`:
- `content/collections/pages/` - Page entries (markdown)
- `content/collections/news/` - News/blog posts
- `content/collections/team/` - Team member profiles
- `content/globals/` - Global settings (SEO, configuration, social media)
- `content/navigation/` - Navigation structures
- `content/taxonomies/` - Taxonomy terms

### View Layer (Antlers Templates)

Views use Antlers templating language (`.antlers.html`):
- `resources/views/` - Main templates
- `resources/views/page_builder/` - Page builder block partials (_block.antlers.html loops through these)
- `resources/views/components/` - Reusable components (buttons, images, videos, etc.)
- `resources/views/typography/` - Typography partials (headings, prose, etc.)
- `resources/views/layout/` - Layout partials (header, footer)
- `resources/views/navigation/` - Navigation templates

### Page Builder System

The site uses a Replicator-based page builder defined in `resources/fieldsets/page_builder.yaml`:
- **Text blocks**: Article (with bard editor supporting figures, tables, pull quotes, videos)
- **Interactive blocks**: Forms, Cards, Preview, Logos, HTML

Each block has:
1. A fieldset definition in `resources/fieldsets/`
2. A template partial in `resources/views/page_builder/`

### Content Schema (Blueprints)

Blueprints define content fields and are in `resources/blueprints/`:
- `collections/pages/page.yaml` - Main page blueprint with page builder
- `collections/news/news.yaml` - News entries
- `collections/team/team.yaml` - Team members
- `globals/` - Global settings blueprints
- `forms/` - Form blueprints

### Frontend Assets

CSS:
- `resources/css/site.css` - Main CSS entry (imports Tailwind and custom styles)
- Multiple Tailwind configs for different aspects:
  - `tailwind.config.js` - Main config (imports presets)
  - `tailwind.config.typography.js` - Typography settings
  - `tailwind.config.peak.js` - Peak starter kit defaults
  - `tailwind.config.site.js` - Site-specific customizations

JavaScript:
- `resources/js/site.js` - Main JS entry (Alpine.js initialization, components)
- `resources/js/cp.js` - Control Panel customizations

### PHP Application Layer

- `app/Providers/` - Service providers
- `app/Listeners/PreventDeletingMounts.php` - Event listener for mount protection
- Standard Laravel structure (Models, Controllers, Middleware)

## Important Statamic Concepts

### The Stache
Statamic's "Stache" is its file-based data cache. When content files change, run `php please stache:warm` to rebuild it.

### Static Caching
In production, the site uses full static caching for performance:
- Clear: `php please static:clear`
- Warm: `php please static:warm --queue`

### Collections
Collections are groups of entries:
- `pages` - hierarchical page structure
- `news` - date-based news/blog posts
- `team` - team member profiles
- `events` - event listings

Each collection has routing rules defined in `content/collections/{collection}.yaml`

### Antlers Syntax
Statamic's templating language:
```antlers
{{ title }}                          <!-- Variable output -->
{{ if condition }}...{{ /if }}       <!-- Conditionals -->
{{ collection:pages }}...{{ /collection:pages }}  <!-- Tag pair -->
{{ partial:components/_button }}     <!-- Partial include -->
```

## Peak-Specific Features

This site is built on Statamic Peak, which provides:
- SEO addon (statamic-peak-seo) - comprehensive SEO management
- Browser appearance addon (statamic-peak-browser-appearance) - favicon/theme color management
- Tools addon (statamic-peak-tools) - utility classes and helpers
- Preconfigured page builder with common blocks
- Responsive navigation with mobile menu
- Form styling and validation

## Environment Configuration

### Development (.env.example reference)
- `STATAMIC_GIT_ENABLED=false` - Disable Git integration locally
- `STATAMIC_STACHE_WATCHER=true` - Auto-refresh Stache
- `STATAMIC_STATIC_CACHING_STRATEGY=null` - No static caching
- `DEBUGBAR_ENABLED=true` - Enable debug bar

### Production (see README.md)
- `STATAMIC_GIT_ENABLED=true` - Enable Git commits for content changes
- `STATAMIC_STATIC_CACHING_STRATEGY=full` - Full page caching
- `STATAMIC_STACHE_WATCHER=false` - Disable for performance
- Queue-based cache warming

## Installed Addons

- `statamic-rad-pack/mailchimp` (v5.3) - Mailchimp integration
- `studio1902/statamic-peak-seo` (v8.23) - SEO management
- `studio1902/statamic-peak-browser-appearance` (v3.6) - Browser appearance
- `studio1902/statamic-peak-tools` (v7.3) - Utility tools
- `transformstudios/events` (v5.8) - Event management
- `osayaweventures/share-links` (v1.0) - Social sharing

## File Structure Notes

- Content assets stored in `public/images/`, `public/files/`, etc.
- Asset configurations in `resources/blueprints/assets/`
- Custom fonts in `resources/fonts/`
- SVG icons in `resources/svg/`
- Control panel customizations in `resources/css/cp.css` and `resources/js/cp.js`

## Deployment

Production deployment scripts are documented in README.md for both Ploi and Forge. Key steps:
1. Skip deployment if commit message contains "[BOT]" (auto-commits from Statamic)
2. Composer install with production flags
3. npm ci && npm run build
4. Cache clearing and warming
5. Queue restart
6. Static cache generation

## Common Workflows

### Adding a New Page Builder Block
1. Create fieldset in `resources/fieldsets/{block_name}.yaml`
2. Add to page_builder sets in `resources/fieldsets/page_builder.yaml`
3. Create template in `resources/views/page_builder/_{block_name}.antlers.html`
4. Clear cache: `php please cache:clear`

### Modifying Content Structure
1. Edit blueprint in `resources/blueprints/`
2. Control Panel will reflect changes immediately
3. Update corresponding Antlers templates in `resources/views/`

### Working with Assets
- Asset containers configured in `content/assets/`
- Upload via Control Panel or place in `public/` directories
- Glide for automatic image manipulation
- Asset blueprints define metadata fields
