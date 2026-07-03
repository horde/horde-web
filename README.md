# horde-web

Source for [www.horde.org](https://www.horde.org/) — the public website of the Horde Project.

This repository is a Horde PHP application (`horde/hordeweb` on Packagist) that renders application and library pages, development resources, downloads, community content, and legacy URL redirects. It is maintained on the `FRAMEWORK_6_0` branch in [horde/horde-web](https://github.com/horde/horde-web).

## Overview

| Item | Detail |
|------|--------|
| Live site | https://www.horde.org/ |
| Default branch | `FRAMEWORK_6_0` |
| PHP | ^8.2 |
| Package name | `horde/hordeweb` |
| Lead maintainer | Ralf Lang |

The site is **fully public** (no login). It boots a minimal Horde framework stack for views, feeds, caching, and routing, but does not run as a full groupware installation.

## Architecture

### Request flow

1. Apache (or lighttpd/nginx) rewrites unknown paths to `dispatch.php` (see `.htaccess`).
2. `dispatch.php` loads Composer, boots Horde via `app/lib/base.php`, and matches the request against `config/routes.php`.
3. A PSR-15 controller in `src/Controller/` handles the route and renders a PHP template from `app/views/`.

```
Browser → .htaccess → dispatch.php → config/routes.php → src/Controller/* → app/views/*
```

### Two deployment modes

`dispatch.php` documents both entry points:

1. **Standalone (production for www.horde.org)** — `dispatch.php` is the document-root entry point. `$host_base` and `$fs_base` in `config/conf.php` define the URL prefix and filesystem root. No Horde registry entry is required.
2. **Embedded in a Horde install** — registered under `horde/rampage.php` via a registry snippet. `Horde\Core` loads the same `config/routes.php` inside a prefixed route group. The middleware stack in `config/routes.php` (`HordeCore`, `ErrorFilter`, `LegacyBootstrap`) applies in that mode.

`config/routes.php` is **app-relative** (no webroot prefix). Both dispatchers wrap it in a `GroupMapper` group so the same routes work in either mode.

### Code layout

| Path | Purpose |
|------|---------|
| `dispatch.php` | Web entry point (standalone mode) |
| `config/routes.php` | All site routes |
| `config/conf.php` | Local site config (not in git; copy from `conf.php.dist`) |
| `config/versions.sqlite` | Release metadata for apps (stable/dev/H3 states) |
| `config/h5/components.d/` | Horde 5 library metadata (JSON per package) |
| `config/h6/components.d/` | Horde 6 library metadata (JSON per package) |
| `src/Controller/` | Modern PSR-15 controllers (`Horde\Hordeweb\Controller\*`) |
| `src/Middleware/` | Route middleware (legacy bootstrap) |
| `app/lib/` | Legacy utilities (`HordeWeb_Utils`, autoload setup) |
| `app/views/` | PHP templates (layouts, partials, per-app pages) |
| `css/`, `js/`, `images/` | Static assets |
| `papers/` | Historical conference slides and papers |
| `bin/` | CLI helpers (feed cache, badge rendering) |
| `versions.php` | XML feed of stable app versions (legacy consumers) |

Legacy classmap code lives under `app/lib/HordeWeb/`. New request handling code belongs in `src/`.

## Local development setup

### Prerequisites

- PHP ^8.2 with SQLite (for `versions.sqlite`)
- A working **Horde core** tree on disk (`HORDE_BASE` — the `horde/horde` application)
- Composer

### Install

```bash
git clone --branch FRAMEWORK_6_0 https://github.com/horde/horde-web.git
cd horde-web
composer install
cp config/conf.php.dist config/conf.php
```

Edit `config/conf.php`:

```php
define('HORDE_BASE', '/path/to/horde');   // horde/horde checkout or deployment

$host_base = 'http://localhost/hordeweb';  // public URL prefix
$fs_base   = '/path/to/horde-web';         // this repository root

$feed_url         = '…';                   // Horde news RSS (tagged per app on app pages)
$planet_feed_url  = '…';                   // Planet Horde / community feed
$feed_timeout     = 30;                    // seconds
```

Point your web server document root (or a subdirectory) at the repository root. Ensure `mod_rewrite` (or equivalent) forwards non-file requests to `dispatch.php`. A lighttpd example is in `config/lighttpd.conf.dist`.

`config/conf.php` and `config/lighttpd.conf` are listed in `.gitignore` and must not be committed.

### Verify

- Home page: `{host_base}/`
- Apps (Horde 6): `{host_base}/apps` or `{host_base}/apps/h6`
- Libraries (Horde 6): `{host_base}/libraries` or `{host_base}/libraries/h6`
- Version list: `{host_base}/development/versions`
- Legacy XML: `{host_base}/versions.php`

## How site content is managed

Most visible content is **static files in git**, not pulled live from GitHub or Packagist at request time. Understanding which tree to edit saves a lot of guesswork.

### Application pages (`/apps/…`, `/apps/h6/…`)

Each application has a directory under `app/views/App/apps/<app>/`:

| File / directory | URL / role |
|------------------|------------|
| `<app>.html.php` | Main app description (e.g. `/apps/h6/imp`) |
| `docs/*.html` | Packaged documentation mirrored for the web (e.g. `/apps/h6/imp/docs/INSTALL`) |
| `appscreenshots.html.php`, `approadmap.html.php`, … | Optional sub-pages |
| `screenshots/` | Screenshot assets |

The apps index (`app/views/App/horde6.html.php`, `horde5.html.php`, …) is hand-maintained HTML listing major applications.

**To add or update an app page:** create or edit templates under `app/views/App/apps/<app>/`. For documentation shown on the site, copy or regenerate the HTML files into `docs/` (the controller includes them verbatim in `docsAction()`).

### Library pages (`/libraries/…`, `/libraries/h6/…`)

Library listings combine two sources:

1. **Metadata** — one JSON file per package in `config/h6/components.d/` (or `config/h5/components.d/`). Example fields: `name`, `summary`, `description`, `version`, `releaseDate`, `download`, `hasCi`, `hasDocuments`.
2. **Documentation HTML** — under `app/views/Library/libraries/<Horde_Package>/docs/` (static HTML, same pattern as app docs).

The library list is built from all `*.json` files in the era's `components.d` directory and cached for 24 hours.

### Release and download information

`config/versions.sqlite` drives download links, the development version table, and `versions.php`.

Schema:

```sql
CREATE TABLE versions (
  application varchar(255),
  state       varchar(255),  -- 'stable', 'dev', 'three'
  version     varchar(255),
  date        varchar(10),
  pear        boolean,
  dir         varchar(255),
  name        varchar(255),
  PRIMARY KEY (application, state)
);
```

Access in code via `HordeWeb_Utils::getStableApps()`, `getDevApps()`, `getH3Apps()`, `getH4Apps()`.

**To record a new release:** update the appropriate row(s) in `versions.sqlite` (e.g. with `sqlite3`) and commit the database file. Download URLs for non-PEAR packages are built from `dir` / `file` fields and point at `ftp://ftp.horde.org/pub/…`; Horde 6 packages link to Packagist via the apps index text and library JSON `download` fields.

### Static assets and legacy URLs

- **CSS/JS/images** — edit directly under `css/`, `js/`, `images/`.
- **URL redirects** — `Permanent` and `gone` rules in `.htaccess` preserve old bookmarked paths from earlier site versions.
- **Conference papers** — `papers/` (mostly static HTML; linked from Community → Papers).

### Home page news feeds

The home page and per-app sidebars show RSS feeds configured in `config/conf.php`. Fetched items are cached in the site PSR-16 cache (Redis on production, or whatever Horde's `SimpleCacheFactory` provides).

Warm the cache from cron:

```bash
php bin/hordeweb-fetch-feed
```

Run every few minutes on production. The script only overwrites cache entries on successful fetch; failed runs leave the previous good data in place.

### Diagnostics

`/_diag/feed-cache` probes cache round-trips. It returns 404 unless `$diag_token` is set in `config/conf.php` and passed as a query parameter. Use only on staging or with a secret token — do not expose on the public internet without protection.

## Common maintenance tasks

### Update an application description

1. Edit `app/views/App/apps/<app>/<app>.html.php`.
2. If the apps index blurb should change, edit `app/views/App/horde6.html.php` (or `horde5.html.php`).
3. Test at `/apps/h6/<app>`.

### Publish updated package documentation on the site

1. Export or copy the package's doc HTML (often from `docs/` in the application repo).
2. Place files in `app/views/App/apps/<app>/docs/` (filename without `.html` becomes the URL segment, e.g. `INSTALL.html` → `…/docs/INSTALL`).
3. Test at `/apps/h6/<app>/docs/<file>`.

### Add or update a library entry (Horde 6)

1. Add `config/h6/components.d/horde_<package>.json` (lowercase package name).
2. Optionally add docs under `app/views/Library/libraries/Horde_<Package>/docs/`.
3. Clear or wait out the 24h library list cache (`hordeweb.libraries.*` keys).
4. Test at `/libraries/h6/Horde_<Package>`.

### Bump a released version

```bash
sqlite3 config/versions.sqlite \
  "UPDATE versions SET version='6.2.25', date='2026-07-01' WHERE application='imp' AND state='stable';"
```

Commit `config/versions.sqlite` and verify `/development/versions` and download pages.

### Render version badges

```bash
bin/hordeweb-render-badge 6.0
```

Requires ImageMagick `convert` with librsvg. Writes SVG and PNG sizes under `images/logos/`.

### Add a route

1. Add the route in `config/routes.php` inside the middleware group.
2. Implement or extend a controller in `src/Controller/`.
3. Add templates under `app/views/<Controller>/`.

## Production deployment (typical)

Exact production steps are server-specific, but the usual pattern is:

1. Clone or `git pull` `FRAMEWORK_6_0` on the www.horde.org host.
2. `composer install --no-dev`
3. Maintain `config/conf.php` on the server (not from git).
4. Ensure `HORDE_BASE` points at the co-located Horde core install used for framework classes, JS/CSS URIs, and cache backends.
5. Configure the web server document root to this tree; enable rewrite to `dispatch.php`.
6. Schedule `bin/hordeweb-fetch-feed` via cron.
7. Ensure a shared PSR-16 cache (Redis recommended) is configured in the Horde install for feed and library metadata performance.

There is no GitHub Actions workflow in this repository; deployment is manual or handled by project infrastructure outside git.

## Contributing

1. Branch from `FRAMEWORK_6_0`.
2. Make focused changes; match existing PHP and template style.
3. Test locally with a realistic `config/conf.php`.
4. Open a pull request against `FRAMEWORK_6_0` on GitHub.

For larger content updates (new app pages, doc mirrors, version bumps), split mechanical copies from editorial rewrites when possible — it makes review easier.

### Related resources

| Resource | URL |
|----------|-----|
| Horde Wiki | https://wiki.horde.org/ |
| API / dev docs | https://dev.horde.org/ |
| Packagist packages | https://packagist.org/packages/horde/ |
| Source browser | https://git.horde.org/horde-git/ |

## License

LGPL-2.1 — see package metadata in `composer.json` and `.horde.yml`.
