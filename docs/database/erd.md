# 🌾 Entity Relationship Diagram (ERD)

## Overview

Dokumen ini menjelaskan hubungan antar entitas pada database **PanenKu**.

---

## Relationship

| Parent Entity | Relationship | Child Entity | Keterangan |
|--------------|--------------|--------------|------------|
| Users | 1 : N | Kebun | Satu pengguna dapat memiliki banyak kebun. |
| Users | 1 : N | Kategori Biaya | Satu pengguna dapat membuat banyak kategori biaya. |
| Users | 1 : N | Biaya | Satu pengguna dapat memiliki banyak data biaya. |
| Kebun | 1 : N | Panen | Satu kebun dapat memiliki banyak data panen. |
| Kebun | 1 : N | Biaya | Biaya dapat dicatat berdasarkan kebun. |
| Kategori Biaya | 1 : N | Biaya | Satu kategori digunakan oleh banyak data biaya. |

---

## Entity Relationship

```text
                    ┌──────────────┐
                    │    USERS     │
                    ├──────────────┤
                    │ id (PK)      │
                    └──────┬───────┘
                           │
          ┌────────────────┼────────────────┐
          │                │                │
          │                │                │
        1 │              1 │              1 │
          │                │                │
        N │              N │              N │
          ▼                ▼                ▼

 ┌────────────────┐ ┌──────────────────┐ ┌──────────────┐
 │     KEBUN      │ │ KATEGORI_BIAYA   │ │    BIAYA     │
 ├────────────────┤ ├──────────────────┤ ├──────────────┤
 │ id (PK)        │ │ id (PK)          │ │ id (PK)      │
 │ user_id (FK)   │ │ user_id (FK)     │ │ user_id (FK) │
 └──────┬─────────┘ └─────────┬────────┘ │ kebun_id(FK) │
        │                     │          │ kategori_id  │
      1 │                   1 │          └──────────────┘
        │                     │                 ▲
      N │                   N │                 │
        ▼                     ▼                 │
 ┌──────────────┐      ┌──────────────┐─────────┘
 │    PANEN     │      │   BIAYA      │
 ├──────────────┤      ├──────────────┤
 │ id (PK)      │      │ kategori_id  │
 │ kebun_id(FK) │      │ kebun_id(FK) │
 └──────────────┘      └──────────────┘
```

---

## Foreign Key

| Table | Foreign Key | Reference |
|--------|-------------|-----------|
| kebun | user_id | users.id |
| panen | kebun_id | kebun.id |
| kategori_biaya | user_id | users.id |
| biaya | user_id | users.id |
| biaya | kebun_id | kebun.id |
| biaya | kategori_id | kategori_biaya.id |