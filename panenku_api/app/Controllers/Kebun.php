<?php

namespace App\Controllers;

use App\Services\KebunService;

class Kebun extends BaseController
{
    protected KebunService $kebunService;

    public function __construct()
    {
        $this->kebunService = new KebunService();
    }

    public function index()
    {
        $user = auth()->user();

        return view('kebun/index', [
            'title'  => 'Data Kebun',
            'kebun'  => $this->kebunService->getByUser($user->id),
        ]);
    }

    public function create()
    {
        return view('kebun/create', [
            'title' => 'Tambah Kebun'
        ]);
    }

    public function store()
    {
        $user = auth()->user();

        $data = [
            'user_id' => $user->id,
            'nama_kebun' => $this->request->getPost('nama_kebun'),
            'lokasi' => $this->request->getPost('lokasi'),
            'luas' => $this->request->getPost('luas'),
            'jenis_tanaman' => $this->request->getPost('jenis_tanaman'),
        ];

        $this->kebunService->create($data);

        return redirect()
            ->to(site_url('kebun'))
            ->with('success', 'Data kebun berhasil ditambahkan.');
    }
}