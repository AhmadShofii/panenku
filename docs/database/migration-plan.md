# 🚀 Migration Plan

## Document Information

| Item | Value |
|------|-------|
| Project | PanenKu |
| Document | Migration Plan |
| Version | 1.0 |
| Framework | CodeIgniter 4 |
| Database | MySQL |

---

# Overview

Dokumen ini menjelaskan urutan pembuatan migration database pada aplikasi **PanenKu**.

Tujuan dokumen ini adalah:

- Menentukan urutan migration yang benar.
- Menghindari error Foreign Key Constraint.
- Memudahkan proses deployment.
- Menjadi acuan saat membuat migration di CodeIgniter 4.

---

# Migration Order

Migration harus dijalankan sesuai urutan berikut.

| No | Migration | Table | Depends On |
|----|-----------|-------|------------|
| 1 | CreateUsersTable | users | - |
| 2 | CreateKebunTable | kebun | users |
| 3 | CreateKategoriBiayaTable | kategori_biaya | users |
| 4 | CreatePanenTable | panen | kebun |
| 5 | CreateBiayaTable | biaya | kebun, kategori_biaya |

---

# Migration Dependency

```text
users
│
├──────────────┐
│              │
▼              ▼
kebun      kategori_biaya
│              │
│              │
▼              ▼
panen      biaya
              ▲
              │
            kebun
```

---

# Migration Detail

## 01. CreateUsersTable

### Table

users

### Purpose

Menyimpan akun pengguna aplikasi.

### Dependency

Tidak memiliki dependency.

### Foreign Key

Tidak ada.

---

## 02. CreateKebunTable

### Table

kebun

### Purpose

Menyimpan data kebun milik pengguna.

### Dependency

- users

### Foreign Key

| Column | Reference |
|--------|-----------|
| user_id | users.id |

---

## 03. CreateKategoriBiayaTable

### Table

kategori_biaya

### Purpose

Menyimpan kategori pengeluaran.

### Dependency

- users

### Foreign Key

| Column | Reference |
|--------|-----------|
| user_id | users.id |

---

## 04. CreatePanenTable

### Table

panen

### Purpose

Menyimpan hasil panen.

### Dependency

- kebun

### Foreign Key

| Column | Reference |
|--------|-----------|
| kebun_id | kebun.id |

---

## 05. CreateBiayaTable

### Table

biaya

### Purpose

Menyimpan seluruh data pengeluaran operasional.

### Dependency

- kebun
- kategori_biaya

### Foreign Key

| Column | Reference |
|--------|-----------|
| kebun_id | kebun.id |
| kategori_id | kategori_biaya.id |

---

# Foreign Key Strategy

| Table | Foreign Key | On Update | On Delete |
|--------|-------------|-----------|-----------|
| kebun | user_id | CASCADE | CASCADE |
| kategori_biaya | user_id | CASCADE | CASCADE |
| panen | kebun_id | CASCADE | CASCADE |
| biaya | kebun_id | CASCADE | CASCADE |
| biaya | kategori_id | CASCADE | RESTRICT |

---

# Rollback Order

Rollback harus dilakukan dari tabel yang memiliki dependency paling tinggi.

| Order | Table |
|--------|-------|
| 1 | biaya |
| 2 | panen |
| 3 | kategori_biaya |
| 4 | kebun |
| 5 | users |

---

# Seeder Plan

Setelah migration berhasil dijalankan, lakukan seeding data dengan urutan berikut.

| Order | Seeder | Description |
|--------|--------|-------------|
| 1 | UserSeeder | Data akun administrator atau pengguna awal |
| 2 | KategoriBiayaSeeder | Kategori biaya bawaan |

Contoh kategori:

- Pupuk
- Bibit
- Pestisida
- Tenaga Kerja
- Transportasi
- Peralatan
- Lainnya

---

# Deployment Flow

```text
Create Database
        │
        ▼
Run Migration
        │
        ▼
Run Seeder
        │
        ▼
Application Ready
```

---

# Checklist

## Migration

- [ ] CreateUsersTable
- [ ] CreateKebunTable
- [ ] CreateKategoriBiayaTable
- [ ] CreatePanenTable
- [ ] CreateBiayaTable

---

## Seeder

- [ ] UserSeeder
- [ ] KategoriBiayaSeeder

---

## Verification

- [ ] Semua tabel berhasil dibuat.
- [ ] Foreign key berhasil dibuat.
- [ ] Index berhasil dibuat.
- [ ] Seeder berhasil dijalankan.
- [ ] Database siap digunakan.

---

# Notes

- Jalankan migration menggunakan:

```bash
php spark migrate
```

- Jalankan seeder menggunakan:

```bash
php spark db:seed UserSeeder
php spark db:seed KategoriBiayaSeeder
```

atau jalankan seluruh seeder utama:

```bash
php spark db:seed DatabaseSeeder
```

- Jangan mengubah urutan migration karena dapat menyebabkan kegagalan Foreign Key Constraint.
- Setiap perubahan struktur tabel harus dibuat melalui migration baru, bukan mengubah migration yang sudah digunakan pada lingkungan produksi.