<?php

namespace App\Controllers;

use App\Services\PanenService;
use App\Services\KebunService;
use CodeIgniter\Exceptions\PageNotFoundException;

class Panen extends BaseController
{
    protected PanenService $panenService;
    protected KebunService $kebunService;

    public function __construct()
    {
        $this->panenService = new PanenService();
        $this->kebunService = new KebunService();
    }

    public function index()
    {
        $data = [
            'title'  => 'Data Panen',
            'panen'  => $this->panenService->getByUser(auth()->id()),
        ];

        return view('panen/index', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Tambah Panen',
            'kebun'   => $this->kebunService->getByUser(auth()->id()),
            'validation' => \Config\Services::validation(),
        ];

        return view('panen/create', $data);
    }

    public function store()
    {
        $rules = [
            'kebun_id'      => 'required|is_natural_no_zero',
            'tanggal_panen' => 'required|valid_date',
            'hasil_kg'      => 'required|decimal',
            'harga_per_kg'  => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $kebun = $this->kebunService->find((int)$this->request->getPost('kebun_id'));

        if (!$kebun || $kebun['user_id'] != auth()->id()) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->panenService->create([
            'kebun_id'      => $this->request->getPost('kebun_id'),
            'tanggal_panen' => $this->request->getPost('tanggal_panen'),
            'hasil_kg'      => $this->request->getPost('hasil_kg'),
            'harga_per_kg'  => $this->request->getPost('harga_per_kg'),
            'catatan'       => $this->request->getPost('catatan'),
        ]);

        return redirect()->to('/panen')
            ->with('success', 'Data panen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $panen = $this->panenService->find((int)$id);

        if (!$panen || $panen['user_id'] != auth()->id()) {
            throw PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title'      => 'Edit Panen',
            'panen'      => $panen,
            'kebun'      => $this->kebunService->getByUser(auth()->id()),
            'validation' => \Config\Services::validation(),
        ];

        return view('panen/edit', $data);
    }

    public function update($id)
    {
        $panen = $this->panenService->find((int)$id);

        if (!$panen || $panen['user_id'] != auth()->id()) {
            throw PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'kebun_id'      => 'required|is_natural_no_zero',
            'tanggal_panen' => 'required|valid_date',
            'hasil_kg'      => 'required|decimal',
            'harga_per_kg'  => 'required|decimal',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->panenService->update((int)$id, [
            'kebun_id'      => $this->request->getPost('kebun_id'),
            'tanggal_panen' => $this->request->getPost('tanggal_panen'),
            'hasil_kg'      => $this->request->getPost('hasil_kg'),
            'harga_per_kg'  => $this->request->getPost('harga_per_kg'),
            'catatan'       => $this->request->getPost('catatan'),
        ]);

        return redirect()->to('/panen')
            ->with('success', 'Data panen berhasil diperbarui.');
    }

    public function delete($id)
    {
        $panen = $this->panenService->find((int)$id);

        if (!$panen || $panen['user_id'] != auth()->id()) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->panenService->delete((int)$id);

        return redirect()->to('/panen')
            ->with('success', 'Data panen berhasil dihapus.');
    }
}