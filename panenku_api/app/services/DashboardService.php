<?php

namespace App\Services;

use App\Models\KebunModel;
use App\Models\PanenModel;

class DashboardService
{
    protected KebunModel $kebunModel;
    protected PanenModel $panenModel;

    public function __construct()
    {
        $this->kebunModel = new KebunModel();
        $this->panenModel = new PanenModel();
    }

    public function getStatistics(int $userId): array
    {
        // Total Kebun
        $totalKebun = $this->kebunModel
            ->where('user_id', $userId)
            ->countAllResults();

        // Statistik Panen
        $panen = $this->panenModel
            ->select('
                COALESCE(SUM(hasil_kg),0) AS total_panen,
                COALESCE(SUM(total_harga),0) AS total_pendapatan,
                COUNT(panen.id) AS total_transaksi
            ')
            ->join('kebun', 'kebun.id = panen.kebun_id')
            ->where('kebun.user_id', $userId)
            ->first();

        return [
            'totalKebun'      => $totalKebun,
            'totalPanenKg'    => (float) ($panen['total_panen'] ?? 0),
            'totalPendapatan' => (float) ($panen['total_pendapatan'] ?? 0),
            'totalTransaksi'  => (int) ($panen['total_transaksi'] ?? 0),
        ];
    }
}