# 🏗️ System Overview

## Document Information

| Item | Value |
|------|-------|
| Project | PanenKu |
| Document | System Overview |
| Version | 1.0 |

---

# Overview

PanenKu adalah aplikasi pencatatan hasil panen dan biaya operasional pertanian yang membantu petani mengelola data kebun, hasil panen, dan pengeluaran secara terpusat.

Aplikasi terdiri dari dua komponen utama:

- **Web Application** (CodeIgniter 4)
- **Mobile Application** (Flutter)

Kedua aplikasi akan menggunakan database yang sama melalui REST API.

---

# System Components

| Component | Technology |
|-----------|------------|
| Backend | CodeIgniter 4 |
| Frontend Web | Bootstrap 5 + AdminLTE |
| Mobile | Flutter |
| Database | MySQL |
| API | REST API |
| Authentication | Session (Web), Token (Mobile) |

---

# High Level Architecture

```text
                    +---------------------+
                    |       Browser       |
                    +----------+----------+
                               |
                               |
                     HTTP Request
                               |
                               ▼
                  +-------------------------+
                  |     CodeIgniter 4       |
                  |  (Web & REST API)       |
                  +-----------+-------------+
                              |
                +-------------+-------------+
                |                           |
                ▼                           ▼
         Session Login               REST API Endpoint
                |                           |
                +-------------+-------------+
                              |
                              ▼
                       MySQL Database
                              ▲
                              |
                     Flutter Mobile
```

---

# Main Modules

- Authentication
- Dashboard
- Kebun
- Panen
- Biaya
- Laporan
- REST API

---

# Development Principle

- MVC Pattern
- RESTful API
- Database First
- Documentation First
- Clean Code