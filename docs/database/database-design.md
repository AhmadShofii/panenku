# 🗄 Database Design

## Document Information

| Item | Value |
|------|-------|
| Project | PanenKu |
| Document | Database Design |
| Version | 1.0 |
| Database | MySQL |
| Framework | CodeIgniter 4 |
| Charset | utf8mb4 |
| Collation | utf8mb4_general_ci |

---

# Overview

Dokumen ini menjelaskan desain database aplikasi **PanenKu** yang digunakan sebagai acuan dalam pengembangan backend, frontend, REST API, dan aplikasi mobile.

Tujuan desain database adalah:

- Menjamin konsistensi data
- Mengurangi duplikasi data
- Mempermudah pengembangan fitur
- Mendukung skalabilitas aplikasi

---

# Database Schema

| Table | Description |
|---------|-----------------------------|
| users | Menyimpan akun pengguna |
| kebun | Menyimpan data kebun |
| panen | Menyimpan data hasil panen |
| kategori_biaya | Menyimpan kategori biaya |
| biaya | Menyimpan pengeluaran operasional |

---

# Table Design

## 1. users

### Description

Menyimpan informasi akun pengguna.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| nama | VARCHAR(100) | NO | - | - |
| email | VARCHAR(100) | NO | UNIQUE | - |
| password | VARCHAR(255) | NO | - | - |
| no_hp | VARCHAR(20) | YES | - | NULL |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

## 2. kebun

### Description

Menyimpan data kebun milik pengguna.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| user_id | BIGINT | NO | FK | - |
| nama_kebun | VARCHAR(100) | NO | - | - |
| lokasi | TEXT | YES | - | NULL |
| luas | DECIMAL(10,2) | YES | - | NULL |
| jenis_tanaman | VARCHAR(100) | YES | - | NULL |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

## 3. panen

### Description

Menyimpan hasil panen dari setiap kebun.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| kebun_id | BIGINT | NO | FK | - |
| tanggal_panen | DATE | NO | - | - |
| hasil_kg | DECIMAL(10,2) | NO | - | 0 |
| harga_per_kg | DECIMAL(12,2) | NO | - | 0 |
| total_harga | DECIMAL(15,2) | NO | - | 0 |
| catatan | TEXT | YES | - | NULL |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

## 4. kategori_biaya

### Description

Kategori pengeluaran.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| user_id | BIGINT | NO | FK | - |
| nama_kategori | VARCHAR(100) | NO | - | - |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

## 5. biaya

### Description

Menyimpan data pengeluaran operasional.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| kebun_id | BIGINT | NO | FK | - |
| kategori_id | BIGINT | NO | FK | - |
| tanggal | DATE | NO | - | - |
| nominal | DECIMAL(15,2) | NO | - | 0 |
| keterangan | TEXT | YES | - | NULL |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

# Relationship

| Parent | Child | Relationship |
|---------|-------|--------------|
| users | kebun | 1 : N |
| users | kategori_biaya | 1 : N |
| kebun | panen | 1 : N |
| kebun | biaya | 1 : N |
| kategori_biaya | biaya | 1 : N |

---

# Foreign Key

| Table | Foreign Key | References |
|---------|-------------|------------|
| kebun | user_id | users.id |
| panen | kebun_id | kebun.id |
| kategori_biaya | user_id | users.id |
| biaya | kebun_id | kebun.id |
| biaya | kategori_id | kategori_biaya.id |

---

# Indexing Strategy

| Table | Index |
|---------|----------------|
| users | email (UNIQUE) |
| kebun | user_id |
| panen | kebun_id |
| kategori_biaya | user_id |
| biaya | kebun_id, kategori_id |

---

# Referential Integrity

- Email pengguna harus unik.
- Data panen harus terkait dengan satu kebun.
- Data biaya harus terkait dengan satu kebun dan satu kategori biaya.
- Penghapusan data harus mempertimbangkan relasi antar tabel.

---

# Naming Convention

| Object | Convention | Example |
|--------|------------|---------|
| Table | snake_case | kategori_biaya |
| Column | snake_case | tanggal_panen |
| Primary Key | id | id |
| Foreign Key | `<table>_id` | kebun_id |

---

# Notes

- Semua Primary Key menggunakan BIGINT AUTO_INCREMENT.
- Password disimpan menggunakan `password_hash()`.
- Charset menggunakan utf8mb4.
- Timestamp menggunakan timezone Asia/Jakarta.# 🗄 Database Design

## Document Information

| Item | Value |
|------|-------|
| Project | PanenKu |
| Document | Database Design |
| Version | 1.0 |
| Database | MySQL |
| Framework | CodeIgniter 4 |
| Charset | utf8mb4 |
| Collation | utf8mb4_general_ci |

---

# Overview

Dokumen ini menjelaskan desain database aplikasi **PanenKu** yang digunakan sebagai acuan dalam pengembangan backend, frontend, REST API, dan aplikasi mobile.

Tujuan desain database adalah:

- Menjamin konsistensi data
- Mengurangi duplikasi data
- Mempermudah pengembangan fitur
- Mendukung skalabilitas aplikasi

---

# Database Schema

| Table | Description |
|---------|-----------------------------|
| users | Menyimpan akun pengguna |
| kebun | Menyimpan data kebun |
| panen | Menyimpan data hasil panen |
| kategori_biaya | Menyimpan kategori biaya |
| biaya | Menyimpan pengeluaran operasional |

---

# Table Design

## 1. users

### Description

Menyimpan informasi akun pengguna.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| nama | VARCHAR(100) | NO | - | - |
| email | VARCHAR(100) | NO | UNIQUE | - |
| password | VARCHAR(255) | NO | - | - |
| no_hp | VARCHAR(20) | YES | - | NULL |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

## 2. kebun

### Description

Menyimpan data kebun milik pengguna.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| user_id | BIGINT | NO | FK | - |
| nama_kebun | VARCHAR(100) | NO | - | - |
| lokasi | TEXT | YES | - | NULL |
| luas | DECIMAL(10,2) | YES | - | NULL |
| jenis_tanaman | VARCHAR(100) | YES | - | NULL |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

## 3. panen

### Description

Menyimpan hasil panen dari setiap kebun.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| kebun_id | BIGINT | NO | FK | - |
| tanggal_panen | DATE | NO | - | - |
| hasil_kg | DECIMAL(10,2) | NO | - | 0 |
| harga_per_kg | DECIMAL(12,2) | NO | - | 0 |
| total_harga | DECIMAL(15,2) | NO | - | 0 |
| catatan | TEXT | YES | - | NULL |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

## 4. kategori_biaya

### Description

Kategori pengeluaran.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| user_id | BIGINT | NO | FK | - |
| nama_kategori | VARCHAR(100) | NO | - | - |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

## 5. biaya

### Description

Menyimpan data pengeluaran operasional.

### Structure

| Field | Type | Null | Key | Default |
|------|------|------|-----|---------|
| id | BIGINT | NO | PK | AUTO_INCREMENT |
| kebun_id | BIGINT | NO | FK | - |
| kategori_id | BIGINT | NO | FK | - |
| tanggal | DATE | NO | - | - |
| nominal | DECIMAL(15,2) | NO | - | 0 |
| keterangan | TEXT | YES | - | NULL |
| created_at | TIMESTAMP | YES | - | NULL |
| updated_at | TIMESTAMP | YES | - | NULL |

---

# Relationship

| Parent | Child | Relationship |
|---------|-------|--------------|
| users | kebun | 1 : N |
| users | kategori_biaya | 1 : N |
| kebun | panen | 1 : N |
| kebun | biaya | 1 : N |
| kategori_biaya | biaya | 1 : N |

---

# Foreign Key

| Table | Foreign Key | References |
|---------|-------------|------------|
| kebun | user_id | users.id |
| panen | kebun_id | kebun.id |
| kategori_biaya | user_id | users.id |
| biaya | kebun_id | kebun.id |
| biaya | kategori_id | kategori_biaya.id |

---

# Indexing Strategy

| Table | Index |
|---------|----------------|
| users | email (UNIQUE) |
| kebun | user_id |
| panen | kebun_id |
| kategori_biaya | user_id |
| biaya | kebun_id, kategori_id |

---

# Referential Integrity

- Email pengguna harus unik.
- Data panen harus terkait dengan satu kebun.
- Data biaya harus terkait dengan satu kebun dan satu kategori biaya.
- Penghapusan data harus mempertimbangkan relasi antar tabel.

---

# Naming Convention

| Object | Convention | Example |
|--------|------------|---------|
| Table | snake_case | kategori_biaya |
| Column | snake_case | tanggal_panen |
| Primary Key | id | id |
| Foreign Key | `<table>_id` | kebun_id |

---

# Notes

- Semua Primary Key menggunakan BIGINT AUTO_INCREMENT.
- Password disimpan menggunakan `password_hash()`.
- Charset menggunakan utf8mb4.
- Timestamp menggunakan timezone Asia/Jakarta.