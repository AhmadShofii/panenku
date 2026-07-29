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

    public function getMonthlyChart(int $userId): array
{
    $labels = [
        'Jan','Feb','Mar','Apr','Mei','Jun',
        'Jul','Agu','Sep','Okt','Nov','Des'
    ];

    $pendapatan = array_fill(0, 12, 0);
    $biaya      = array_fill(0, 12, 0);

    // Pendapatan per bulan
    $panen = $this->panenModel
        ->select("
            MONTH(tanggal_panen) AS bulan,
            SUM(total_harga) AS total
        ")
        ->join('kebun', 'kebun.id = panen.kebun_id')
        ->where('kebun.user_id', $userId)
        ->groupBy('MONTH(tanggal_panen)')
        ->findAll();

    foreach ($panen as $row) {

        $pendapatan[$row['bulan'] - 1] = (float) $row['total'];

    }

    // Biaya per bulan
    $pengeluaran = $this->biayaModel
        ->select("
            MONTH(tanggal) AS bulan,
            SUM(nominal) AS total
        ")
        ->join('kebun', 'kebun.id = biaya.kebun_id')
        ->where('kebun.user_id', $userId)
        ->groupBy('MONTH(tanggal)')
        ->findAll();

    foreach ($pengeluaran as $row) {

        $biaya[$row['bulan'] - 1] = (float) $row['total'];

    }

    return [
        'labels'      => $labels,
        'pendapatan'  => $pendapatan,
        'biaya'       => $biaya,
    ];
}

}