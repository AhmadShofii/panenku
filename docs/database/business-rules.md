# 📋 Business Rules

## Authentication

- Email harus unik.
- Password wajib di-hash menggunakan `password_hash()`.
- User hanya dapat melihat data miliknya sendiri.

---

## Kebun

- Satu user dapat memiliki banyak kebun.
- Nama kebun boleh sama selama lokasi berbeda.

---

## Panen

- Panen wajib terhubung ke satu kebun.
- Total harga dihitung otomatis.

```
total_harga = hasil_kg × harga_per_kg
```

- Hasil panen tidak boleh bernilai negatif.

---

## Biaya

- Biaya harus memiliki kategori.
- Biaya dapat dikaitkan dengan satu kebun.
- Nominal biaya harus lebih dari 0.

---

## Dashboard

Dashboard menampilkan:

- Total Kebun
- Total Panen
- Total Pendapatan
- Total Pengeluaran
- Grafik Panen