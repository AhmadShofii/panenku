# 🔐 Authentication API

## Login

### Endpoint

```http
POST /auth/login
```

### Request

```json
{
  "email": "user@mail.com",
  "password": "password123"
}
```

### Success Response

```json
{
  "success": true,
  "message": "Login berhasil",
  "data": {
    "id": 1,
    "nama": "Budi Santoso",
    "email": "user@mail.com"
  }
}
```

---

## Register

```http
POST /auth/register
```

### Request

```json
{
  "nama": "Budi Santoso",
  "email": "user@mail.com",
  "password": "password123",
  "no_hp": "08123456789"
}
```

---

## Logout

```http
POST /auth/logout
```