# Stack Memory — ByteOath

## Tech stack
| Layer      | Choice                              |
|------------|-------------------------------------|
| Language   | PHP 8.2                             |
| Routing    | `nikic/fast-route` (PSR-4: ByteOath\)|
| CSS        | Tailwind CSS CLI (compiled)         |
| JS         | Vanilla ES2020 (no framework)       |
| Database   | SQLite via PDO (swappable to MySQL) |
| Server     | Nginx + PHP-FPM                     |
| Containers | Docker Compose                      |

## File map
```
public/index.php          front controller — routes + Config::load()
src/Core/Config.php       static config store
src/Core/Env.php          .env loader
src/Core/Router.php       FastRoute wrapper
src/Core/View.php         template renderer (render/partial/include)
src/Core/Controller.php   base class (injects $this->view)
src/Core/Database.php     PDO SQLite singleton, auto-migrates schema
src/Controllers/          one class per resource
templates/layouts/        base.php (public) | admin.php (admin)
templates/partials/       nav.php | footer.php
templates/components/     page-hero.php | cta-section.php
templates/pages/          page templates
resources/css/input.css   CSS source (@layer base/components/utilities)
public/assets/css/tailwind.css  compiled output (committed)
public/assets/js/main.js  nav | scroll-reveal | form | typewriter
assets/brand/             logo SVGs (source of truth)
storage/                  SQLite DB (Docker volume, gitignored)
.env                      secrets (gitignored)
```

## Docker services
```
phpfpm   php:8.2-fpm-alpine + pdo_sqlite + opcache   port 9000
nginx    nginx:alpine                                  port 3000 → 80
```
```
Volumes:  db_storage  (SQLite persistence)
Network:  site_net
```

## Naming conventions
- PHP namespace: `ByteOath\Controllers\`, `ByteOath\Core\`
- CSS classes: `.bo-[component]__[element]` or `.bo-[name]`
- Tailwind custom: `font-display`, `font-body`, `font-mono`, `bg-primary`, `text-accent`, `text-muted`
- Docker: service `phpfpm`, `nginx` | volume `db_storage` | network `site_net`

