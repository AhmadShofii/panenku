# 🌾 Panen API

## List Panen

```http
GET /panen
```

---

## Detail Panen

```http
GET /panen/{id}
```

---

## Tambah Panen

```http
POST /panen
```

### Request

```json
{
  "kebun_id": 1,
  "tanggal_panen": "2026-08-01",
  "hasil_kg": 1200,
  "harga_per_kg": 6500,
  "catatan": "Panen pertama"
}
```

---

## Update Panen

```http
PUT /panen/{id}
```

---

## Hapus Panen

```http
DELETE /panen/{id}
```