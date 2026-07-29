<?php

namespace App\Services;

use App\Models\BiayaModel;
use App\Models\PanenModel;

class LaporanService
{
    protected PanenModel $panenModel;
    protected BiayaModel $biayaModel;

    public function __construct()
    {
        $this->panenModel = new PanenModel();
        $this->biayaModel = new BiayaModel();
    }

    public function getLaporan(
        int $userId,
        ?string $mulai = null,
        ?string $selesai = null,
        ?int $kebunId = null
    ): array {

        // =========================
        // DATA PANEN
        // =========================
        $panenBuilder = $this->panenModel
            ->select('panen.*, kebun.nama_kebun')
            ->join('kebun', 'kebun.id = panen.kebun_id')
            ->where('kebun.user_id', $userId);

        if ($mulai) {
            $panenBuilder->where('tanggal_panen >=', $mulai);
        }

        if ($selesai) {
            $panenBuilder->where('tanggal_panen <=', $selesai);
        }

        if ($kebunId) {
            $panenBuilder->where('panen.kebun_id', $kebunId);
        }

        $panen = $panenBuilder->findAll();

        // =========================
        // DATA BIAYA
        // =========================
        $biayaBuilder = $this->biayaModel
            ->select('biaya.*, kebun.nama_kebun, kategori_biaya.nama_kategori')
            ->join('kebun', 'kebun.id = biaya.kebun_id')
            ->join('kategori_biaya', 'kategori_biaya.id = biaya.kategori_id')
            ->where('kebun.user_id', $userId);

        if ($mulai) {
            $biayaBuilder->where('tanggal >=', $mulai);
        }

        if ($selesai) {
            $biayaBuilder->where('tanggal <=', $selesai);
        }

        if ($kebunId) {
            $biayaBuilder->where('biaya.kebun_id', $kebunId);
        }

        $biaya = $biayaBuilder->findAll();

        $totalPendapatan = array_sum(array_column($panen, 'total_harga'));
        $totalBiaya      = array_sum(array_column($biaya, 'nominal'));

        return [
            'panen'           => $panen,
            'biaya'           => $biaya,
            'totalPendapatan' => $totalPendapatan,
            'totalBiaya'      => $totalBiaya,
            'labaBersih'      => $totalPendapatan - $totalBiaya,
        ];
    }
}