<?php

namespace App\Services;

use App\Models\BiayaModel;

class BiayaService
{
    protected BiayaModel $biayaModel;

    public function __construct()
    {
        $this->biayaModel = new BiayaModel();
    }

    /**
     * Ambil seluruh data biaya beserta nama kebun dan kategori.
     */
    public function getAll(): array
    {
        return $this->biayaModel
            ->select('
                biaya.*,
                kebun.nama_kebun,
                kategori_biaya.nama_kategori
            ')
            ->join('kebun', 'kebun.id = biaya.kebun_id')
            ->join('kategori_biaya', 'kategori_biaya.id = biaya.kategori_id')
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    }

    /**
     * Ambil satu data biaya berdasarkan ID.
     */
    public function getById(int $id): ?array
    {
        return $this->biayaModel->find($id);
    }

    /**
     * Simpan data biaya.
     */
    public function create(array $data): bool
    {
        return $this->biayaModel->insert($data);
    }

    /**
     * Update data biaya.
     */
    public function update(int $id, array $data): bool
    {
        return $this->biayaModel->update($id, $data);
    }

    /**
     * Hapus data biaya.
     */
    public function delete(int $id): bool
    {
        return $this->biayaModel->delete($id);
    }

    /**
     * Total seluruh biaya.
     */
    public function getTotalBiaya(): float
    {
        return (float) ($this->biayaModel
            ->selectSum('nominal')
            ->first()['nominal'] ?? 0);
    }

    /**
     * Total biaya berdasarkan kebun.
     */
    public function getTotalByKebun(int $kebunId): float
    {
        return (float) ($this->biayaModel
            ->selectSum('nominal')
            ->where('kebun_id', $kebunId)
            ->first()['nominal'] ?? 0);
    }
}