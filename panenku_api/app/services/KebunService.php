<?php

namespace App\Services;

use App\Models\KebunModel;

class KebunService
{
    protected KebunModel $model;

    public function __construct()
    {
        $this->model = new KebunModel();
    }

    public function getByUser(int $userId): array
    {
        return $this->model
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    public function create(array $data): bool
    {
        return $this->model->insert($data);
    }
}