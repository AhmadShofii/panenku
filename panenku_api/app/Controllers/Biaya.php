<?php

namespace App\Controllers;

use App\Models\KebunModel;
use App\Models\KategoriBiayaModel;
use App\Services\BiayaService;

class Biaya extends BaseController
{
    protected BiayaService $biayaService;
    protected KebunModel $kebunModel;
    protected KategoriBiayaModel $kategoriModel;

    public function __construct()
    {
        $this->biayaService = new BiayaService();
        $this->kebunModel = new KebunModel();
        $this->kategoriModel = new KategoriBiayaModel();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Biaya',
            'biaya'  => $this->biayaService->getAll(),
        ];

        return view('biaya/index', $data);
    }

    public function create()
    {
        $data = [
            'title'      => 'Tambah Biaya',
            'kebun'      => $this->kebunModel->findAll(),
            'kategori'   => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('biaya/create', $data);
    }

    public function store()
    {
        $data = [
            'kebun_id'   => $this->request->getPost('kebun_id'),
            'kategori_id'=> $this->request->getPost('kategori_id'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'nominal'    => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->biayaService->create($data);

        return redirect()
            ->to('/biaya')
            ->with('success', 'Data biaya berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = [
            'title'      => 'Edit Biaya',
            'biaya'      => $this->biayaService->getById($id),
            'kebun'      => $this->kebunModel->findAll(),
            'kategori'   => $this->kategoriModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('biaya/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'kebun_id'   => $this->request->getPost('kebun_id'),
            'kategori_id'=> $this->request->getPost('kategori_id'),
            'tanggal'    => $this->request->getPost('tanggal'),
            'nominal'    => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->biayaService->update($id, $data);

        return redirect()
            ->to('/biaya')
            ->with('success', 'Data biaya berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->biayaService->delete($id);

        return redirect()
            ->to('/biaya')
            ->with('success', 'Data biaya berhasil dihapus.');
    }
}