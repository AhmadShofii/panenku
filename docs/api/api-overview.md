# 🌐 API Overview

## Document Information

| Item | Value |
|------|-------|
| Project | PanenKu |
| Document | API Overview |
| Version | 1.0 |

---

# Overview

Dokumen ini menjelaskan standar REST API yang digunakan oleh aplikasi PanenKu.

REST API digunakan untuk komunikasi antara backend CodeIgniter 4 dengan aplikasi Web dan Mobile (Flutter).

---

# Base URL

## Development

```text
http://localhost:8080/api/v1
```

## Production

```text
https://api.panenku.com/api/v1
```

---

# API Modules

| Module | Endpoint |
|---------|----------|
| Authentication | `/auth` |
| Kebun | `/kebun` |
| Panen | `/panen` |
| Biaya | `/biaya` |

---

# HTTP Methods

| Method | Description |
|---------|-------------|
| GET | Mengambil data |
| POST | Menambah data |
| PUT | Memperbarui data |
| DELETE | Menghapus data |

---

# Authentication

| Client | Authentication |
|---------|----------------|
| Web | Session |
| Mobile | Bearer Token *(direncanakan)* |

---

# Response Format

Semua endpoint menggunakan format JSON.

Contoh:

```json
{
  "success": true,
  "message": "Data berhasil diambil",
  "data": {}
}
```