# 📖 Database Convention

## Document Information

| Item | Value |
|------|-------|
| Project | PanenKu |
| Document | Database Convention |
| Version | 1.0 |
| Database | MySQL |
| Framework | CodeIgniter 4 |

---

# Overview

Dokumen ini berisi standar dan konvensi yang digunakan dalam perancangan serta pengembangan database aplikasi **PanenKu**.

Tujuan dokumen ini adalah:

- Menjaga konsistensi struktur database.
- Memudahkan pengembangan fitur baru.
- Mengurangi kesalahan penulisan nama tabel dan kolom.
- Menjadi acuan bagi seluruh developer.

---

# Naming Convention

## Table

- Menggunakan **snake_case**.
- Menggunakan bentuk **jamak** atau **tunggal** secara konsisten. Pada proyek ini dipilih **tunggal**.

| Benar | Salah |
|--------|--------|
| users | Users |
| kebun | Kebuns |
| panen | TblPanen |

---

## Column

Gunakan **snake_case**.

| Benar | Salah |
|--------|--------|
| nama_kebun | NamaKebun |
| harga_per_kg | hargaPerKg |
| created_at | CreatedAt |

---

## Primary Key

Seluruh tabel menggunakan:

```text
id
```

Contoh:

```sql
id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
```

---

## Foreign Key

Gunakan format:

```text
<nama_tabel>_id
```

Contoh:

```text
user_id
kebun_id
kategori_id
```

---

# Data Type Standard

## ID

| Type |
|------|
| BIGINT UNSIGNED |

---

## Text

| Data | Type |
|------|------|
| Nama | VARCHAR(100) |
| Email | VARCHAR(100) |
| Password | VARCHAR(255) |
| Nomor HP | VARCHAR(20) |

---

## Long Text

Gunakan

```text
TEXT
```

untuk:

- lokasi
- keterangan
- catatan

---

## Number

| Data | Type |
|------|------|
| Luas | DECIMAL(10,2) |
| Berat Panen | DECIMAL(10,2) |
| Harga | DECIMAL(12,2) |
| Total | DECIMAL(15,2) |
| Nominal Biaya | DECIMAL(15,2) |

---

## Date

| Data | Type |
|------|------|
| Tanggal Panen | DATE |
| Tanggal Biaya | DATE |

---

## Timestamp

Semua tabel menggunakan:

```text
created_at
updated_at
```

Jika suatu saat menggunakan Soft Delete, tambahkan:

```text
deleted_at
```

---

# Nullability

Gunakan **NOT NULL** jika data wajib diisi.

Gunakan **NULL** jika data bersifat opsional.

| Field | Null |
|--------|------|
| nama | ❌ |
| email | ❌ |
| password | ❌ |
| lokasi | ✅ |
| catatan | ✅ |

---

# Default Value

| Field | Default |
|--------|----------|
| nominal | 0 |
| hasil_kg | 0 |
| harga_per_kg | 0 |
| total_harga | 0 |

---

# Index Convention

## Primary Key

Semua tabel memiliki:

```sql
PRIMARY KEY(id)
```

---

## Unique Index

Gunakan UNIQUE untuk data yang tidak boleh sama.

Contoh:

```sql
email
```

---

## Foreign Key Index

Semua Foreign Key harus di-index.

Contoh:

```text
user_id
kebun_id
kategori_id
```

---

# Foreign Key Rule

| Table | FK | ON UPDATE | ON DELETE |
|--------|----|-----------|-----------|
| kebun | user_id | CASCADE | CASCADE |
| kategori_biaya | user_id | CASCADE | CASCADE |
| panen | kebun_id | CASCADE | CASCADE |
| biaya | kebun_id | CASCADE | CASCADE |
| biaya | kategori_id | CASCADE | RESTRICT |

---

# Timestamp Convention

Gunakan format:

```text
YYYY-MM-DD HH:MM:SS
```

Timezone:

```text
Asia/Jakarta
```

---

# Character Set

Gunakan:

| Item | Value |
|------|-------|
| Charset | utf8mb4 |
| Collation | utf8mb4_general_ci |

---

# Security Convention

- Password harus disimpan menggunakan `password_hash()`.
- Jangan pernah menyimpan password dalam bentuk plain text.
- Validasi seluruh input sebelum disimpan ke database.
- Gunakan Query Builder atau ORM CodeIgniter 4 untuk mengurangi risiko SQL Injection.

---

# Soft Delete Policy

Untuk versi **MVP**, tabel tidak menggunakan **Soft Delete**.

Jika dibutuhkan di masa mendatang, gunakan kolom:

```text
deleted_at
```

dan fitur `SoftDeletes` dari CodeIgniter 4.

---

# Migration Convention

- Satu migration hanya untuk satu tabel.
- Nama migration menggunakan format:

```text
CreateUsersTable
CreateKebunTable
CreatePanenTable
CreateKategoriBiayaTable
CreateBiayaTable
```

---

# Model Convention

Setiap tabel memiliki satu model.

| Table | Model |
|--------|-------|
| users | UserModel |
| kebun | KebunModel |
| panen | PanenModel |
| kategori_biaya | KategoriBiayaModel |
| biaya | BiayaModel |

---

# Best Practices

- Jangan mengubah migration yang sudah dijalankan pada lingkungan produksi.
- Gunakan migration baru untuk setiap perubahan struktur database.
- Hindari penyimpanan data yang redundan.
- Selalu gunakan Foreign Key untuk menjaga integritas data.
- Gunakan transaksi database (`DB Transaction`) untuk operasi yang melibatkan lebih dari satu tabel.
- Dokumentasikan setiap perubahan struktur database pada `CHANGELOG.md`.

---

# Summary

Konvensi ini menjadi acuan utama dalam pengembangan database PanenKu agar struktur data tetap konsisten, mudah dipahami, dan siap dikembangkan untuk fitur-fitur selanjutnya.