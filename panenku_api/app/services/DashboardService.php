<?php

namespace App\Services;

use App\Models\KebunModel;
use App\Models\PanenModel;
use App\Models\BiayaModel;

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
        $totalKebun = $this->kebunModel
            ->where('user_id', $userId)
            ->countAllResults();

        $totalPanen = $this->panenModel
            ->selectSum('hasil_kg')
            ->join('kebun', 'kebun.id = panen.kebun_id')
            ->where('kebun.user_id', $userId)
            ->first();

        $totalBiaya = $this->biayaModel
            ->selectSum('nominal')
            ->join('kebun', 'kebun.id = biaya.kebun_id')
            ->where('kebun.user_id', $userId)
            ->first();

        return [
            'totalKebun' => $totalKebun,
            'totalPanen' => $totalPanen['hasil_kg'] ?? 0,
            'totalBiaya' => $totalBiaya['nominal'] ?? 0,
        ];
    }
}