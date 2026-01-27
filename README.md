# Nazleh's Goldsmith

Production-minded Laravel application for managing physical gold and silver bars with QR-based public verification.

## Requirements
- PHP 8.1+ (8.2+ recommended)
- Composer
- MySQL or Postgres

## Setup
1) Install dependencies:
   - `composer install`
   - If you see Windows file-lock errors, close editors/AV scans and re-run.
2) Install Breeze (Blade):
   - `php artisan breeze:install blade`
3) Configure environment:
   - Copy `.env.example` to `.env`
   - Set:
     - `APP_URL=https://nazlehs-goldsmith.example`
     - `QR_BASE_URL=https://nazlehs-goldsmith.example`
4) Generate app key:
   - `php artisan key:generate`
5) Run migrations:
   - `php artisan migrate`

## Make a user admin
Option 1 (tinker):
- `php artisan tinker`
- `User::where('email', 'admin@example.com')->update(['is_admin' => true]);`

Option 2 (SQL):
- `UPDATE users SET is_admin = 1 WHERE email = 'admin@example.com';`

## QR generation
The stable QR entrypoint is always:
`https://{APP_URL}/q/{public_id}`

Generate bars + QR codes before the site is finished:
```
php artisan bars:generate --count=100 --metal=gold --weight=100.000 --purity=999.9
```

Custom base URL and output:
```
php artisan bars:generate --count=50 --metal=silver --weight=50.000 --format=svg --base-url=https://nazlehs-goldsmith.example --output=storage/app/qr_exports/custom/
```

The command writes QR images and a CSV export to `storage/app/qr_exports/{timestamp}/`.

## Scanning flow
- QR encodes: `https://{APP_URL}/q/{public_id}`
- `/q/{public_id}` permanently redirects to `/bar/{public_id}`
- `/bar/{public_id}` shows only the bar public ID and owner name (or "Not assigned yet")

## Deployment notes
- Use HTTPS in production.
- Set `APP_URL` and `QR_BASE_URL` to your public HTTPS domain.
- Keep `/q/{public_id}` stable forever.

## QR in Production
Run this on the server after deployment (HTTPS assumed):
```bash
php artisan optimize:clear
php artisan migrate --force
php artisan bars:generate --count=100 --metal=gold --weight=100.000 --purity=999.9 --format=png
```

Base URL behavior:
- The generator uses `--base-url` if provided.
- Otherwise it uses `QR_BASE_URL`, and falls back to `APP_URL`.

Where files are saved:
- Default folder: `storage/app/qr_exports/{timestamp}/`
- Each run creates a new timestamped folder.
- Each folder contains QR image files and `export.csv`.

Confirm the redirect works:
```bash
php artisan tinker --execute="echo \\App\\Models\\Bar::query()->latest()->value('public_id');"
curl -I https://YOUR-DOMAIN/q/PASTE_PUBLIC_ID_HERE
```
Expected result:
- HTTP status should be `302` or `301`.
- The `Location` header should point to `/bar/{public_id}`.

Confirm the public bar page:
```bash
curl https://YOUR-DOMAIN/bar/PASTE_PUBLIC_ID_HERE
```
Expected result:
- HTTP status should be `200`.
- The response should include the bar public ID.
- The response should include the owner name or `Not assigned yet`.

Inspect DB records:
```bash
php artisan tinker --execute="\\App\\Models\\Bar::query()->select('public_id','owner_user_id','metal_type','weight','purity','status')->latest()->take(5)->get()->each->dump();"
```

Recommended QR export download workflow (no public UI):
```bash
# On the server
powershell -Command "Compress-Archive -Path storage\\app\\qr_exports\\20260127_123000 -DestinationPath storage\\app\\qr_exports\\20260127_123000.zip"

# From your local machine
scp user@your-server:/path/to/app/storage/app/qr_exports/20260127_123000.zip .
```
Notes:
- Replace the timestamp with your actual export folder.
- On Linux servers, you can use: `zip -r storage/app/qr_exports/20260127_123000.zip storage/app/qr_exports/20260127_123000`

Common failure points:
- `APP_URL` or `QR_BASE_URL` is missing, not HTTPS, or has the wrong domain.
- Web server root is not the Laravel `public/` directory.
- Cached config/routes are stale. Run `php artisan optimize:clear`.
- Storage permissions prevent writing to `storage/app/`.
- Nginx/Apache rewrite rules are not forwarding to `public/index.php`.

## Testing
1) Make sure a DB driver is available for tests:
   - Preferred: enable the PHP SQLite extension and keep `phpunit.xml` using sqlite.
   - Alternative: create a test database and set `DB_CONNECTION/DB_DATABASE` in `.env.testing`.
2) Run tests:
   - `php artisan test`
