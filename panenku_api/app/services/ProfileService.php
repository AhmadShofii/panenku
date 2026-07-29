<?php

namespace App\Services;

use App\Models\BiayaModel;
use App\Models\KebunModel;
use App\Models\PanenModel;
use CodeIgniter\Shield\Models\UserModel;

class ProfileService
{
    protected UserModel $userModel;
    protected KebunModel $kebunModel;
    protected PanenModel $panenModel;
    protected BiayaModel $biayaModel;

    public function __construct()
    {
        $this->userModel  = new UserModel();
        $this->kebunModel = new KebunModel();
        $this->panenModel = new PanenModel();
        $this->biayaModel = new BiayaModel();
    }

    /**
     * Ambil data user berdasarkan ID.
     */
    public function getProfile(int $userId)
    {
        return $this->userModel->find($userId);
    }

    /**
     * Statistik pengguna.
     */
    public function getStatistics(int $userId): array
    {
        $totalKebun = $this->kebunModel
            ->where('user_id', $userId)
            ->countAllResults();

        $panen = $this->panenModel
            ->select('
                COALESCE(SUM(hasil_kg),0) AS total_panen,
                COALESCE(SUM(total_harga),0) AS total_pendapatan
            ')
            ->join('kebun', 'kebun.id = panen.kebun_id')
            ->where('kebun.user_id', $userId)
            ->first();

        return [
            'totalKebun'      => $totalKebun,
            'totalPanenKg'    => (float) ($panen['total_panen'] ?? 0),
            'totalPendapatan' => (float) ($panen['total_pendapatan'] ?? 0),
        ];
    }

    /**
     * Update username dan email.
     */
    public function updateProfile(int $userId, array $data): bool
{
    return $this->userModel->update($userId, [
        'username' => $data['username'],
    ]);
}
}