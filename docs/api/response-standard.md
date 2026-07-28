# 📦 Response Standard

## Success Response

```json
{
  "success": true,
  "message": "Operasi berhasil",
  "data": {}
}
```

---

## Validation Error

```json
{
  "success": false,
  "message": "Validasi gagal",
  "errors": {
    "email": "Email wajib diisi"
  }
}
```

---

## Not Found

```json
{
  "success": false,
  "message": "Data tidak ditemukan"
}
```

---

## Unauthorized

```json
{
  "success": false,
  "message": "Unauthorized"
}
```

---

## HTTP Status Code

| Status | Description |
|--------|-------------|
| 200 | OK |
| 201 | Created |
| 400 | Bad Request |
| 401 | Unauthorized |
| 403 | Forbidden |
| 404 | Not Found |
| 422 | Validation Error |
| 500 | Internal Server Error |