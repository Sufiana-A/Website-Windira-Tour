# 🌍 Website Windira Tour

[![PHP](https://img.shields.io/badge/language-PHP-777BB4.svg?logo=php\&logoColor=white)]()
[![Laravel](https://img.shields.io/badge/framework-Laravel-FF2D20.svg?logo=laravel\&logoColor=white)]()
[![MySQL](https://img.shields.io/badge/database-MySQL-4479A1.svg?logo=mysql\&logoColor=white)]()

---

## Table of Contents

* [Overview](#overview)
* [Features](#features)
* [Getting Started](#getting-started)
  * [Prerequisites](#prerequisites)
  * [Installation](#installation)
* [Usage](#usage)

---

## Overview

**Website Windira Tour** adalah aplikasi berbasis **Laravel** yang menyediakan layanan reservasi perjalanan wisata.
Pengguna dapat melakukan reservasi hotel, transportasi (pesawat dan kereta), serta mendapatkan konfirmasi dari admin agen perjalanan.

Proyek ini dikembangkan sebagai sistem pemesanan sederhana yang mendukung manajemen pelanggan, reservasi, pembayaran, hingga riwayat transaksi.

---

## Features

* **📝 Register**
  Pengguna baru dapat membuat akun dengan mengisi data diri.

* **🔐 Login & Logout**
  Admin dan pelanggan dapat login/logout sesuai peran masing-masing.

* **👤 Profil Pelanggan**
  Pelanggan dapat mengelola informasi profil, termasuk kontak.

* **🏨✈️🚆 Reservasi**
  Pelanggan dapat memilih destinasi, transportasi (pesawat/kereta), serta hotel. Admin akan mengonfirmasi ketersediaan & harga.

* **💳 Pembayaran**
  Setelah reservasi dikonfirmasi, pelanggan dapat melakukan pembayaran dalam jangka waktu tertentu. Jika lewat batas waktu, reservasi batal.

* **📜 Riwayat Pemesanan**
  Pelanggan dapat melihat riwayat reservasi yang berhasil dikonfirmasi.

* **☎️ Contact Us**
  Pelanggan dapat menghubungi agen perjalanan via telepon atau email jika ada kendala.

* **✅ Manajemen Konfirmasi Reservasi (Admin)**
  Admin dapat melakukan verifikasi & konfirmasi terhadap reservasi pelanggan.

---

## Getting Started

### Prerequisites

Pastikan sudah terinstall:

* **PHP** 8.0+
* **Composer**
* **MySQL** (atau database lain yang kompatibel dengan Laravel)
* **Laravel** 9+

### Installation

Clone repository:

```bash
git clone https://github.com/Sufiana-A/Website-Windira-Tour.git
cd Website-Windira-Tour
cd windira
```

Install dependencies:

```bash
composer install
```

Copy konfigurasi environment:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Set database di file `.env` lalu migrasi:

```bash
php artisan migrate
```

---

## Usage

Jalankan server lokal Laravel:

```bash
cd windira
php artisan serve
```

Akses aplikasi melalui:
👉 `http://127.0.0.1:8000/`

---
