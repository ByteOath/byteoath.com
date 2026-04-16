# Skill: Deployment

## Local
```bash
cp .env.example .env && npm install && npm run build
docker compose up -d
# → http://localhost:3000
```

## Production (Dokploy / any VPS)
```bash
# On server first time
git clone <repo> /var/www/byteoath.com
cd /var/www/byteoath.com && cp .env.example .env
nano .env   # fill production values
docker compose build && docker compose up -d

# Every deploy after
git pull origin main
docker compose build phpfpm && docker compose up -d
```

## Environment variables (required for production)
```
SITE_PORT=80
SITE_URL=https://byteoath.com
CONTACT_EMAIL=hello@byteoath.com
ADMIN_USER=admin
ADMIN_PASS_HASH=<bcrypt hash>  # php -r "echo password_hash('pass', PASSWORD_BCRYPT);"
APP_STORE_URL=https://apps.shopify.com/...
GITHUB_URL=https://github.com/byteoath
LINKEDIN_URL=https://linkedin.com/company/byteoath
```

## Production rules
- Never run `docker compose down -v` — wipes SQLite DB
- `db_storage` volume persists across `docker compose down` / `up`
- Port 3000 internal only — proxy via Nginx/Caddy/Traefik on host
- Admin password must be changed from default before go-live

## Useful Docker commands
```bash
docker compose ps                          # container status
docker compose logs -f phpfpm             # PHP errors
docker compose exec phpfpm sh             # shell in PHP container
docker compose exec phpfpm sqlite3 /var/www/html/storage/submissions.sqlite \
  "SELECT * FROM submissions ORDER BY created_at DESC LIMIT 20;"
```

