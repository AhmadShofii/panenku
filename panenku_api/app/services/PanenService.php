<?php

namespace App\Services;

use App\Models\PanenModel;

class PanenService
{
    protected PanenModel $panenModel;

    public function __construct()
    {
        $this->panenModel = new PanenModel();
    }

    public function getByUser(int $userId): array
    {
        return $this->panenModel
            ->select('panen.*, kebun.nama_kebun')
            ->join('kebun', 'kebun.id = panen.kebun_id')
            ->where('kebun.user_id', $userId)
            ->orderBy('tanggal_panen', 'DESC')
            ->findAll();
    }

    public function find(int $id): ?array
    {
        return $this->panenModel
            ->select('panen.*, kebun.user_id')
            ->join('kebun', 'kebun.id = panen.kebun_id')
            ->where('panen.id', $id)
            ->first();
    }

    public function create(array $data): bool
    {
        $data['total_harga'] = $this->calculateTotal(
            $data['hasil_kg'],
            $data['harga_per_kg']
        );

        return $this->panenModel->insert($data);
    }

    public function update(int $id, array $data): bool
    {
        $data['total_harga'] = $this->calculateTotal(
            $data['hasil_kg'],
            $data['harga_per_kg']
        );

        return $this->panenModel->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->panenModel->delete($id);
    }

    public function calculateTotal($hasilKg, $hargaPerKg): float
    {
        return (float)$hasilKg * (float)$hargaPerKg;
    }
}