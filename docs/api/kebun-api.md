# 🌱 Kebun API

## List Kebun

```http
GET /kebun
```

---

## Detail Kebun

```http
GET /kebun/{id}
```

---

## Tambah Kebun

```http
POST /kebun
```

### Request

```json
{
  "nama_kebun": "Kebun Timur",
  "lokasi": "Desa Sukamaju",
  "luas": 2.5,
  "jenis_tanaman": "Padi"
}
```

---

## Update Kebun

```http
PUT /kebun/{id}
```

---

## Hapus Kebun

```http
DELETE /kebun/{id}
```