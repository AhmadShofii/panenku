# 🌾 PanenKu

# Dokumentasi Project
## Sistem Informasi Manajemen Perkebunan


---

# 1. Pendahuluan

## 1.1 Deskripsi Sistem

PanenKu adalah aplikasi berbasis web yang digunakan untuk membantu pengelolaan aktivitas perkebunan secara digital.

Aplikasi ini dibuat untuk membantu pengguna dalam melakukan pencatatan:

- Data kebun
- Data hasil panen
- Data biaya operasional
- Laporan pendapatan
- Perhitungan laba bersih


Dengan adanya sistem ini, proses pencatatan yang sebelumnya dilakukan secara manual dapat dilakukan secara lebih cepat, rapi, dan terintegrasi.


---

# 2. Tujuan Sistem

Tujuan pengembangan aplikasi PanenKu:

1. Membantu pengguna mengelola data perkebunan.
2. Mempermudah pencatatan hasil panen.
3. Mengelola biaya operasional perkebunan.
4. Menghitung pendapatan dan keuntungan.
5. Menyediakan laporan perkebunan.


---

# 3. Teknologi Yang Digunakan


## Backend

| Teknologi | Versi |
|---|---|
| PHP | 8.2 |
| CodeIgniter | 4.7.4 |
| Composer | - |


## Database

| Teknologi |
|-|
| MySQL |


## Frontend

| Teknologi |
|-|
| Bootstrap 5 |
| Bootstrap Icons |
| DataTables |
| SweetAlert2 |
| Chart.js |


## Authentication

Menggunakan:

- CodeIgniter Shield
- Session Authentication
- Password Hashing


---

# 4. Fitur Sistem


# 4.1 Authentication

Fitur keamanan pengguna:

- Register
- Login
- Logout
- Session Protection
- Magic Link Login
- Change Password


---

# 4.2 Dashboard

Dashboard menyediakan informasi:

- Total kebun
- Total hasil panen
- Total pendapatan
- Total biaya
- Laba bersih
- Grafik pendapatan dan biaya


---

# 4.3 Manajemen Kebun


Pengguna dapat:

- Melihat data kebun
- Menambah kebun
- Mengedit kebun
- Menghapus kebun


Data kebun hanya dapat diakses oleh pemilik akun.


---

# 4.4 Manajemen Panen


Fitur:

- Input tanggal panen
- Input hasil panen
- Input harga per Kg
- Perhitungan total harga otomatis
- Edit data panen
- Hapus data panen


Rumus:

```
Total Harga = Hasil Panen × Harga per Kg
```


---

# 4.5 Manajemen Biaya


Fitur:

- Input biaya operasional
- Kategori biaya
- Edit biaya
- Hapus biaya


---

# 4.6 Laporan


Fitur:

- Rekap data perkebunan
- Laporan pendapatan
- Export PDF


---

# 4.7 Profile


Fitur:

- Melihat profile
- Mengubah username
- Mengubah password


---

# 5. Struktur Sistem


```
User

 |

Authentication

 |

Dashboard

 |

+----------------------------+

|            |               |

Kebun       Panen          Biaya

 |

Laporan

 |

Database

```


---

# 6. Dokumentasi Database


Database:

```
panenku
```


---

# 6.1 Tabel users


Menyimpan data pengguna.


| Field | Keterangan |
|-|-|
| id | Primary Key |
| username | Nama pengguna |
| email | Email user |
| password_hash | Password terenkripsi |


---

# 6.2 Tabel kebun


Menyimpan data kebun.


| Field | Keterangan |
|-|-|
| id | Primary Key |
| user_id | Pemilik kebun |
| nama_kebun | Nama kebun |
| lokasi | Lokasi kebun |
| luas | Luas kebun |
| jenis_tanaman | Jenis tanaman |


Relasi:

```
users

1

|

*

kebun
```


---

# 6.3 Tabel panen


Menyimpan data hasil panen.


| Field | Keterangan |
|-|-|
| id | Primary Key |
| kebun_id | Relasi kebun |
| tanggal_panen | Tanggal panen |
| hasil_kg | Berat panen |
| harga_per_kg | Harga/kg |
| total_harga | Total pendapatan |
| catatan | Catatan tambahan |


Relasi:

```
kebun

1

|

*

panen
```


---

# 6.4 Tabel biaya


Menyimpan biaya operasional.


| Field | Keterangan |
|-|-|
| id | Primary Key |
| kebun_id | Relasi kebun |
| kategori_id | Kategori biaya |
| tanggal | Tanggal biaya |
| nominal | Jumlah biaya |
| keterangan | Catatan |


---

# 7. Route Documentation


## Dashboard

```
GET /dashboard
```


---

## Kebun


```
GET  /kebun

GET  /kebun/create

POST /kebun/store

GET  /kebun/edit/{id}

POST /kebun/update/{id}

GET  /kebun/delete/{id}
```


---

## Panen


```
GET  /panen

GET  /panen/create

POST /panen/store

GET  /panen/edit/{id}

POST /panen/update/{id}

GET  /panen/delete/{id}
```


---

## Biaya


```
GET  /biaya

GET  /biaya/create

POST /biaya/store

GET  /biaya/edit/{id}

POST /biaya/update/{id}

GET  /biaya/delete/{id}
```


---

## Profile


```
GET  /profile

GET  /profile/edit

POST /profile/update

GET  /profile/password

POST /profile/password/update
```


---

# 8. User Guide


## Login

1. Masukkan email.
2. Masukkan password.
3. Klik login.


---

## Menambah Kebun

1. Masuk menu Kebun.
2. Klik Tambah Kebun.
3. Isi data kebun.
4. Klik Simpan.


---

## Menambah Panen

1. Masuk menu Panen.
2. Klik Tambah Panen.
3. Pilih kebun.
4. Masukkan hasil panen.
5. Masukkan harga.
6. Sistem menghitung total otomatis.


---

## Menambah Biaya

1. Masuk menu Biaya.
2. Klik Tambah Biaya.
3. Pilih kategori.
4. Masukkan nominal.
5. Simpan.


---

## Melihat Laporan

1. Masuk menu Laporan.
2. Pilih data laporan.
3. Export PDF.


---

# 9. QA Report Sprint 8


## Hasil Testing


| Modul | Status |
|-|-|
| Authentication | PASS |
| Dashboard | PASS |
| Kebun | PASS |
| Panen | PASS |
| Biaya | PASS |
| Laporan | PASS |
| Profile | PASS |


---

# Bug Fixed


## BUG-001

Feature:

Magic Link Login


Masalah:

Email login link tidak terkirim.


Penyebab:

SMTP belum dikonfigurasi.


Solusi:

Menggunakan SMTP Gmail dengan App Password.


Status:

FIXED


---

# 10. Development Sprint


| Sprint | Fitur | Status |
|-|-|-|
| Sprint 1 | Authentication | ✅ |
| Sprint 2 | Dashboard | ✅ |
| Sprint 3 | CRUD Kebun | ✅ |
| Sprint 4 | CRUD Panen | ✅ |
| Sprint 5 | CRUD Biaya | ✅ |
| Sprint 6 | Laporan PDF | ✅ |
| Sprint 7 | UI/UX & Profile | ✅ |
| Sprint 8 | Testing & QA | ✅ |
| Sprint 9 | Documentation | ✅ |


---

# 11. Version


Current Version:

```
v1.8.0
```


---

# 12. Kesimpulan


PanenKu berhasil dikembangkan sebagai sistem informasi manajemen perkebunan yang mampu membantu pengguna dalam mengelola data kebun, panen, biaya, laporan, dan keuntungan.

Aplikasi telah melalui tahap pengembangan, pengujian, dan dokumentasi sehingga siap untuk tahap pengembangan berikutnya.