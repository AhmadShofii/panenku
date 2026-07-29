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

    public function find(int $id): ?array
    {
        return $this->model->find($id);
    }

    public function create(array $data): bool
    {
        return (bool) $this->model->insert($data);
    }

    public function update(int $id, array $data): bool
    {
        return $this->model->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->model->delete($id);
    }
}