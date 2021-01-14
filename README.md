# Casual News

Merupakan web aplikasi yang membolehkan sekelompok orang untuk mempublikasikan berita terkini.

**Pencipta:** Athaariq Ardhiansyah

**Framework:** Laravel 8 + Jetstream Inertia

**Library Editor:** Vue2Editor

## Email dan Password

- Email: `johndoe@example.com`
  Role: `user`
  Password: `12345678`
- Email: `admin@example.com`
  Role: `curator`
  Password: `12345678`

## Instalasi

Proses ini hanya dilakukan sekali. Diasumsikan sudah terpasang NPM/Yarn, NodeJS, Composer, PHP, dan [ekstensi PHP yang diperlukan](https://laravel.com/docs/7.x/installation#server-requirements) untuk Laravel 8.

Selain itu, pastikan sistem operasi menggunakan MacOS atau Linux. Untuk pengguna Windows 10 silahkan pasang WSL2 terlebih dahulu.

### 1. Pasang dependencies PHP

Sebelumnya pastikan sudah terpasang Composer versi 2.x.x, kemudian jalankan:

```bash
composer install
```

### 2. Pasang dependencies untuk Vue

Untuk NPM:

```bash
npm install && npm run prod
```

Untuk Yarn:

```bash
yarn install && yarn run prod
```

### 3. Pasang Docker dan Docker Compose

Anda tidak perlu memasang MySQL, Redis, Memcached, dan konfigurasi satu per satu. Namun Anda hanya perlu pasang Docker untuk mengatur semuanya. Masukkan command berikut:

```bash
sudo apt update && sudo apt install docker docker-compose -y
```

### 4. Atur Sail

Tahap ini untuk mempermudah penggunaan Docker Compose. Masukkan command berikut:

```bash
nano .bashrc
```

Pada baris paling terakhir, masukkan baris berikut:

```bash
alias sail='bash vendor/bin/sail'
```

### 5. Auto-Configure dengan Sail

Untuk mengkonfigurasi MySQL, Redis, dan lain-lain secara otomatis, jalankan command berikut:

```bash
sail build
```

Lalu biarkan hingga selesai.

## Cara Menjalankannya

Sangat mudah, asalkan proses instalasi sudah beres. Cukup jalankan command ini:

```bash
sail up
```

Untuk menghentikannya, tekan **CTRL+C**.

## Migrasi Database

Setelah instalasi, database masih kosongan. Untuk mengisinya pertama-tama pastikan web app dalam posisi menyala dan stabil (tidak banyak output console bercucuran) lalu jalankan command berikut:

```bash
sail artisan migrate && sail artisan db:seed
```
