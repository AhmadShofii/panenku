# 💰 Biaya API

## List Biaya

```http
GET /biaya
```

---

## Detail Biaya

```http
GET /biaya/{id}
```

---

## Tambah Biaya

```http
POST /biaya
```

### Request

```json
{
  "kebun_id": 1,
  "kategori_id": 2,
  "tanggal": "2026-08-01",
  "nominal": 500000,
  "keterangan": "Pembelian pupuk"
}
```

---

## Update Biaya

```http
PUT /biaya/{id}
```

---

## Hapus Biaya

```http
DELETE /biaya/{id}
```