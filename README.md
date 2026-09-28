# PBKK Tugas 4 — Multi-View Profil Akademik

Project Laravel ini merupakan kelanjutan dari Tugas 2, di-upgrade untuk memenuhi requirement Tugas 4: Membangun Aplikasi Multi-View Profil Akademik.

## Fitur Utama & Penyelesaian Tugas 4

1. **Master Layout Terpusat**
   Menggunakan `resources/views/layouts/app.blade.php` sebagai layout utama yang diwarisi (`@extends`) oleh seluruh halaman. Navbar dan elemen global berada di layout ini.

2. **Route, Controller, dan View (Multi-View)**
   - `GET /` &rarr; `PageController@home`
   - `GET /profil-mahasiswa` &rarr; `PageController@profile`
   - `GET /ide-agent` &rarr; `PageController@agent`

3. **Blade Components (Anonymous)**
   Terdapat 2 komponen *reusable* yang benar-benar diimplementasikan pada view:
   - `<x-info-card>` (`resources/views/components/info-card.blade.php`)
   - `<x-status-alert>` (`resources/views/components/status-alert.blade.php`)

4. **Vite Asset Bundling + Tailwind CSS v4**
   - Menggunakan Vite untuk compile asset (`npm run build` / `npm run dev`).
   - Tailwind CSS tidak lagi menggunakan CDN, melainkan local dependency dengan `@tailwindcss/vite`.

5. **Challenge 1: Toggle Tema Dinamis**
   - Menggunakan pendekatan parameter URL (`?theme=dark` atau `?theme=light`).
   - Menerapkan Tailwind class-based dark mode (`@custom-variant dark (&:where(.dark, .dark *));`).
   - Tombol *Toggle Theme* di navbar akan mempertahankan parameter query yang ada dan tidak me-redirect ke home.

6. **Challenge 2: Alert Status Interaktif**
   - Halaman `/profil-mahasiswa` menerima parameter `?status=`.
   - Menampilkan alert jika status bernilai `success`, `info`, atau `warning`.
   - Menggunakan `<x-status-alert>` komponen secara dinamis.

## Fitur Tugas 2 yang Dipertahankan

Seluruh route dan logika dari Tugas 2 sengaja **dipertahankan sepenuhnya**, termasuk:
- `/dashboard/mahasiswa/{nrp}` (Detail mahasiswa dengan validasi regex)
- `/dashboard/agent/{tema?}` (Ide agentic AI versi lama dengan default parameter)
- `/dashboard/hitung-ipk/{ip1}/{ip2}` (Kalkulator IPK)
- Fallback route (Custom 404 page)

## Cara Menjalankan Project

1. Install Composer dependencies:
   ```bash
   composer install
   ```

2. Install NPM dependencies dan build asset dengan Vite:
   ```bash
   npm install
   npm run build
   # Atau untuk development: npm run dev
   ```

3. Jalankan Laravel development server:
   ```bash
   php artisan serve
   ```

## Pengujian Interaktif (Challenges)

**Test Status Alert (Challenge 2):**
- `/profil-mahasiswa?status=success`
- `/profil-mahasiswa?status=info`
- `/profil-mahasiswa?status=warning`

**Test Tema Dinamis (Challenge 1):**
- Klik tombol "Dark / Light Mode" di Navbar pada halaman apapun.
- Atau, tambahkan `?theme=dark` pada URL manapun.
