# Anonyms

Anonyms adalah website pesan rahasia anonim untuk membuat tautan pribadi, menerima pesan anonim, dan membaca pesan secara aman melalui akun pengguna.

## Fitur

- Autentikasi pengguna dengan CodeIgniter Shield.
- Tautan publik untuk menerima pesan rahasia anonim.
- Pesan disimpan dalam bentuk terenkripsi.
- Dashboard pesan dengan status belum dibaca dan sudah dibaca.
- Penghapusan pesan manual.
- Pembersihan otomatis untuk pesan yang berumur lebih dari 7 hari.
- Screenshot pesan.
- SEO dasar, Open Graph, Twitter Card, dan JSON-LD.
- CSP, CSRF, honeypot, throttling, dan mode maintenance.
- Asset CSS dan JS versi readable serta minified.

## Teknologi

- PHP 8.2+
- CodeIgniter 4.7+
- CodeIgniter Shield
- MySQL atau MariaDB
- Bootstrap dan Bootstrap Icons
- jQuery
- html-to-image
- downloadjs

## Struktur Penting

```text
app/
  Config/              Konfigurasi aplikasi
  Controllers/         Alur request utama
  Database/            Migration dan seeder
  Entities/            Entity pesan terenkripsi
  Filters/             Maintenance, anti-bot, dan throttle
  Models/              Query dan akses data
  Views/               Template halaman
public/
  css/style.css        CSS readable
  css/style.min.css    CSS minified untuk production
  js/app.js            JavaScript readable
  js/app.min.js        JavaScript minified untuk production
  img/og.webp          Gambar Open Graph
```

## Instalasi

1. Install dependency.

```bash
composer install
```

2. Salin file environment.

```bash
copy .env.example .env
```

3. Generate encryption key.

```bash
php spark key:generate
```

4. Sesuaikan konfigurasi `.env`.

```ini
APP_NAME = 'Anonyms'
APP_DESC = 'Kirim dan terima pesan rahasia anonim dengan Anonyms. Buat tautan pribadi, bagikan ke teman, lalu dapatkan pesan anonim secara mudah, aman, dan rahasia.'
APP_MAINTENANCE = false
CI_ENVIRONMENT = production

app.baseURL = 'https://domain-kamu.com/'
app.forceGlobalSecureRequests = true
contentSecurityPolicy.upgradeInsecureRequests = true
cookie.secure = true

database.default.hostname = 'hostname-server'
database.default.database = 'nama_database'
database.default.username = 'username_database'
database.default.password = 'password_database'
database.default.port = 3306
```

Sesuaikan `hostname`, `username`, `password`, `port`, dan nama database dengan konfigurasi server kamu.

5. Jalankan migration dan seeder.

```bash
php spark migrate
php spark db:seed MessageSeeder
```

6. Jalankan server lokal jika masih di environment development.

```bash
php spark serve
```

## Perintah Pengembangan

```bash
composer test
php spark routes
php spark migrate
php spark db:seed MessageSeeder
```

Untuk coverage, pastikan Xdebug atau PCOV tersedia.

```bash
composer test:coverage
```

## Asset Production

Source asset utama tetap readable:

```text
public/css/style.css
public/js/app.js
```

Duplikat minified tersedia untuk production:

```text
public/css/style.min.css
public/js/app.min.js
```

Saat `CI_ENVIRONMENT=production`, helper `app_asset_url()` otomatis memakai file `.min` jika file tersebut tersedia.

## Konfigurasi Production

Sebelum hosting, sesuaikan `.env`:

```ini
CI_ENVIRONMENT = production
app.baseURL = 'https://domain-kamu.com/'
app.forceGlobalSecureRequests = true
contentSecurityPolicy.upgradeInsecureRequests = true
cookie.secure = true
contentSecurityPolicy.reportOnly = false

database.default.hostname = 'hostname-server'
database.default.database = 'nama_database'
database.default.username = 'username_database'
database.default.password = 'password_database'
database.default.port = 3306
```

Sesuaikan konfigurasi database dengan data dari hosting atau server kamu.
Pastikan document root hosting mengarah ke folder `public/`, bukan root project.

## Route Utama

| Method | Path            | Keterangan                         |
| ------ | --------------- | ---------------------------------- |
| GET    | `/`             | Dashboard pesan pengguna           |
| GET    | `/p`            | Edit profil                        |
| POST   | `/p`            | Update profil                      |
| GET    | `/u/{username}` | Form kirim pesan rahasia           |
| POST   | `/u/{username}` | Simpan pesan rahasia               |
| GET    | `/m/{uid}`      | Detail pesan                       |
| DELETE | `/m/{uid}`      | Hapus pesan                        |
| GET    | `/success`      | Halaman sukses setelah kirim pesan |
| GET    | `/login`        | Masuk                              |
| GET    | `/register`     | Daftar                             |
| GET    | `/logout`       | Keluar                             |

## SEO

Layout sudah menyediakan:

- Meta description.
- Canonical URL.
- Meta robots.
- Open Graph.
- Twitter Card.
- JSON-LD untuk `Organization`, `WebSite`, dan `WebApplication`.

Catatan: sebagian besar halaman aplikasi memakai `noindex, nofollow` karena berisi halaman autentikasi, dashboard, profil, dan pesan rahasia.

## Keamanan

- Secret message dienkripsi melalui entity.
- CSRF aktif.
- Honeypot aktif.
- Throttle aktif.
- CSP aktif.
- Secure headers aktif.
- Maintenance mode tersedia melalui `APP_MAINTENANCE`.

Jangan commit `.env` production atau membagikan `encryption.key`.

## Lisensi

Project ini menggunakan lisensi MIT. Lihat [LICENSE](LICENSE).
