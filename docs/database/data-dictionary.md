# 📚 Data Dictionary

## Overview

Dokumen ini menjelaskan definisi setiap tabel dan kolom pada database **PanenKu**. Data dictionary digunakan sebagai acuan dalam pengembangan backend, frontend, serta dokumentasi API agar seluruh tim memiliki pemahaman yang sama terhadap struktur data.

---

# Database Information

| Item | Value |
|------|-------|
| Database Name | `panenku` |
| DBMS | MySQL |
| Framework | CodeIgniter 4 |
| Charset | utf8mb4 |
| Collation | utf8mb4_general_ci |

---

# Table : users

## Description

Menyimpan data akun pengguna aplikasi.

| Field | Data Type | Constraints | Description | Example |
|------|-----------|------------|-------------|---------|
| id | BIGINT | PK, AI | Primary Key pengguna | 1 |
| nama | VARCHAR(100) | NOT NULL | Nama lengkap pengguna | Budi Santoso |
| email | VARCHAR(100) | UNIQUE, NOT NULL | Email yang digunakan untuk login | budi@mail.com |
| password | VARCHAR(255) | NOT NULL | Password yang sudah di-hash | `$2y$10$...` |
| no_hp | VARCHAR(20) | NULL | Nomor telepon pengguna | 08123456789 |
| created_at | TIMESTAMP | NULL | Waktu data dibuat | 2026-07-28 10:00:00 |
| updated_at | TIMESTAMP | NULL | Waktu terakhir diperbarui | 2026-07-28 10:30:00 |

---

# Table : kebun

## Description

Menyimpan informasi kebun yang dimiliki oleh pengguna.

| Field | Data Type | Constraints | Description | Example |
|------|-----------|------------|-------------|---------|
| id | BIGINT | PK, AI | Primary Key kebun | 1 |
| user_id | BIGINT | FK, NOT NULL | Referensi ke tabel users | 1 |
| nama_kebun | VARCHAR(100) | NOT NULL | Nama kebun | Kebun Timur |
| lokasi | TEXT | NULL | Alamat atau lokasi kebun | Desa Sukamaju |
| luas | DECIMAL(10,2) | NULL | Luas kebun (hektar) | 2.50 |
| jenis_tanaman | VARCHAR(100) | NULL | Jenis tanaman utama | Padi |
| created_at | TIMESTAMP | NULL | Waktu data dibuat | 2026-07-28 10:00:00 |
| updated_at | TIMESTAMP | NULL | Waktu terakhir diperbarui | 2026-07-28 10:30:00 |

---

# Table : panen

## Description

Menyimpan data hasil panen dari setiap kebun.

| Field | Data Type | Constraints | Description | Example |
|------|-----------|------------|-------------|---------|
| id | BIGINT | PK, AI | Primary Key panen | 1 |
| kebun_id | BIGINT | FK, NOT NULL | Referensi ke tabel kebun | 2 |
| tanggal_panen | DATE | NOT NULL | Tanggal panen | 2026-07-28 |
| hasil_kg | DECIMAL(10,2) | NOT NULL | Total hasil panen (kg) | 1200.50 |
| harga_per_kg | DECIMAL(12,2) | NOT NULL | Harga jual per kilogram | 6500.00 |
| total_harga | DECIMAL(15,2) | NOT NULL | Total pendapatan panen | 7803250.00 |
| catatan | TEXT | NULL | Catatan tambahan | Panen musim kemarau |
| created_at | TIMESTAMP | NULL | Waktu data dibuat | 2026-07-28 10:00:00 |
| updated_at | TIMESTAMP | NULL | Waktu terakhir diperbarui | 2026-07-28 10:30:00 |

---

# Table : kategori_biaya

## Description

Menyimpan kategori pengeluaran yang dimiliki oleh pengguna.

| Field | Data Type | Constraints | Description | Example |
|------|-----------|------------|-------------|---------|
| id | BIGINT | PK, AI | Primary Key kategori | 1 |
| user_id | BIGINT | FK, NOT NULL | Referensi ke tabel users | 1 |
| nama_kategori | VARCHAR(100) | NOT NULL | Nama kategori biaya | Pupuk |
| created_at | TIMESTAMP | NULL | Waktu data dibuat | 2026-07-28 10:00:00 |
| updated_at | TIMESTAMP | NULL | Waktu terakhir diperbarui | 2026-07-28 10:30:00 |

---

# Table : biaya

## Description

Menyimpan data pengeluaran operasional berdasarkan kebun dan kategori biaya.

| Field | Data Type | Constraints | Description | Example |
|------|-----------|------------|-------------|---------|
| id | BIGINT | PK, AI | Primary Key biaya | 1 |
| kebun_id | BIGINT | FK, NOT NULL | Referensi ke tabel kebun | 1 |
| kategori_id | BIGINT | FK, NOT NULL | Referensi ke tabel kategori_biaya | 2 |
| tanggal | DATE | NOT NULL | Tanggal pengeluaran | 2026-07-28 |
| nominal | DECIMAL(15,2) | NOT NULL | Nominal pengeluaran | 500000.00 |
| keterangan | TEXT | NULL | Catatan pengeluaran | Pembelian pupuk organik |
| created_at | TIMESTAMP | NULL | Waktu data dibuat | 2026-07-28 10:00:00 |
| updated_at | TIMESTAMP | NULL | Waktu terakhir diperbarui | 2026-07-28 10:30:00 |

---

# Foreign Key Reference

| Table | Foreign Key | Reference |
|------|-------------|-----------|
| kebun | user_id | users.id |
| panen | kebun_id | kebun.id |
| kategori_biaya | user_id | users.id |
| biaya | kebun_id | kebun.id |
| biaya | kategori_id | kategori_biaya.id |

---

# Naming Convention

| Object | Convention | Example |
|--------|------------|---------|
| Table | snake_case | `kategori_biaya` |
| Column | snake_case | `tanggal_panen` |
| Primary Key | `id` | `id` |
| Foreign Key | `<table>_id` | `kebun_id` |
| Timestamp | `created_at`, `updated_at` | `created_at` |

---

# Notes

- Seluruh **Primary Key** menggunakan tipe `BIGINT AUTO_INCREMENT`.
- Seluruh **Foreign Key** menggunakan tipe `BIGINT`.
- Password disimpan menggunakan fungsi `password_hash()`.
- Nilai `total_harga` pada tabel **panen** dihitung dari:

```text
total_harga = hasil_kg × harga_per_kg
```

- Semua data menggunakan timezone **Asia/Jakarta**.
- Seluruh tabel menggunakan karakter **utf8mb4** agar mendukung karakter Unicode.