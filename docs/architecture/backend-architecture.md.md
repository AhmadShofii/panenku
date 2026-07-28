# ⚙️ Backend Architecture

## Technology Stack

| Item | Technology |
|------|------------|
| Framework | CodeIgniter 4 |
| PHP | 8.2+ |
| Database | MySQL |
| Authentication | Session |
| API | REST |

---

# Directory Structure

```text
app/
├── Config/
├── Controllers/
│   ├── Auth/
│   ├── DashboardController.php
│   ├── KebunController.php
│   ├── PanenController.php
│   ├── BiayaController.php
│   └── Api/
│
├── Models/
├── Filters/
├── Helpers/
├── Libraries/
├── Services/
├── Database/
└── Views/
```

---

# Request Flow

```text
Browser
    │
    ▼
Routes
    │
    ▼
Controller
    │
    ▼
Service
    │
    ▼
Model
    │
    ▼
Database
```

---

# Responsibilities

## Controller

- Menerima request
- Validasi input
- Memanggil Service
- Mengembalikan response

---

## Service

- Menjalankan business logic
- Mengelola transaksi database
- Menghubungkan Controller dan Model

---

## Model

- Berinteraksi langsung dengan database
- Menjalankan query CRUD
- Mengelola relasi data

---

# Security

- CSRF Protection
- XSS Filtering
- Password Hashing
- Validation
- Session Authentication