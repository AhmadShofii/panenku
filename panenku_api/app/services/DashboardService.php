<?php

namespace App\Services;

use App\Models\BiayaModel;
use App\Models\KebunModel;
use App\Models\PanenModel;

class DashboardService
{
    protected KebunModel $kebunModel;
    protected PanenModel $panenModel;
    protected BiayaModel $biayaModel;

    public function __construct()
    {
        $this->kebunModel = new KebunModel();
        $this->panenModel = new PanenModel();
        $this->biayaModel = new BiayaModel();
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

        // Statistik Biaya
        $biaya = $this->biayaModel
            ->select('COALESCE(SUM(nominal),0) AS total_biaya')
            ->join('kebun', 'kebun.id = biaya.kebun_id')
            ->where('kebun.user_id', $userId)
            ->first();

        $totalPendapatan = (float) ($panen['total_pendapatan'] ?? 0);
        $totalBiaya      = (float) ($biaya['total_biaya'] ?? 0);

        return [
            'totalKebun'      => $totalKebun,
            'totalPanenKg'    => (float) ($panen['total_panen'] ?? 0),
            'totalPendapatan' => $totalPendapatan,
            'totalTransaksi'  => (int) ($panen['total_transaksi'] ?? 0),
            'totalBiaya'      => $totalBiaya,
            'labaBersih'      => $totalPendapatan - $totalBiaya,
        ];
    }
}