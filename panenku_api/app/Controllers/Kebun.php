<?php

namespace App\Controllers;

use App\Services\KebunService;
use CodeIgniter\Exceptions\PageNotFoundException;

class Kebun extends BaseController
{
    protected KebunService $kebunService;

    public function __construct()
    {
        $this->kebunService = new KebunService();
    }

    public function index()
    {
        return view('kebun/index', [
            'title'  => 'Data Kebun',
            'kebun'  => $this->kebunService->getByUser(auth()->id()),
        ]);
    }

    public function create()
    {
        return view('kebun/create', [
            'title'      => 'Tambah Kebun',
            'validation' => service('validation'),
        ]);
    }

    public function store()
    {
        $rules = [
            'nama_kebun' => 'required|max_length[100]',
            'luas'        => 'permit_empty|decimal',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Data kebun gagal disimpan. Periksa kembali data yang diinput.');
        }

        $data = [
            'user_id'         => auth()->id(),
            'nama_kebun'      => $this->request->getPost('nama_kebun'),
            'lokasi'          => $this->request->getPost('lokasi'),
            'luas'            => $this->request->getPost('luas'),
            'jenis_tanaman'   => $this->request->getPost('jenis_tanaman'),
        ];

        $this->kebunService->create($data);

        return redirect()
            ->to(site_url('kebun'))
            ->with('success', 'Data kebun berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kebun = $this->kebunService->find((int) $id);

        if (! $kebun) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($kebun['user_id'] != auth()->id()) {
            return redirect()
                ->to(site_url('kebun'))
                ->with('error', 'Akses ditolak.');
        }

        return view('kebun/edit', [
            'title'      => 'Edit Kebun',
            'kebun'      => $kebun,
            'validation' => service('validation'),
        ]);
    }

    public function update($id)
    {
        $kebun = $this->kebunService->find((int) $id);

        if (! $kebun) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($kebun['user_id'] != auth()->id()) {
            return redirect()
                ->to(site_url('kebun'))
                ->with('error', 'Akses ditolak.');
        }

        $rules = [
            'nama_kebun' => 'required|max_length[100]',
            'luas'        => 'permit_empty|decimal',
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Data kebun gagal diperbarui. Periksa kembali data yang diinput.');
        }

        $data = [
            'nama_kebun'    => $this->request->getPost('nama_kebun'),
            'lokasi'        => $this->request->getPost('lokasi'),
            'luas'          => $this->request->getPost('luas'),
            'jenis_tanaman' => $this->request->getPost('jenis_tanaman'),
        ];

        $this->kebunService->update((int) $id, $data);

        return redirect()
            ->to(site_url('kebun'))
            ->with('success', 'Data kebun berhasil diperbarui.');
    }

    public function delete($id)
    {
        $kebun = $this->kebunService->find((int) $id);

        if (! $kebun) {
            throw PageNotFoundException::forPageNotFound();
        }

        if ($kebun['user_id'] != auth()->id()) {
            return redirect()
                ->to(site_url('kebun'))
                ->with('error', 'Akses ditolak.');
        }

        $this->kebunService->delete((int) $id);

        return redirect()
            ->to(site_url('kebun'))
            ->with('success', 'Data kebun berhasil dihapus.');
    }
}