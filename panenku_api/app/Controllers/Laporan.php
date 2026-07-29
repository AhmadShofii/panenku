<?php

namespace App\Controllers;

use App\Models\KebunModel;
use App\Services\LaporanService;
use Dompdf\Dompdf;
use Dompdf\Options;

class Laporan extends BaseController
{
    protected LaporanService $laporanService;

    public function __construct()
    {
        $this->laporanService = new LaporanService();
    }

    public function index()
    {
        $mulai   = $this->request->getGet('mulai');
        $selesai = $this->request->getGet('selesai');
        $kebunId = $this->request->getGet('kebun_id');

        $data = $this->laporanService->getLaporan(
            auth()->id(),
            $mulai,
            $selesai,
            $kebunId ? (int) $kebunId : null
        );

        $kebunModel = new KebunModel();

        $data['kebun'] = $kebunModel
            ->where('user_id', auth()->id())
            ->findAll();

        $data['title'] = 'Laporan';
        $data['mulai'] = $mulai;
        $data['selesai'] = $selesai;

        return view('laporan/index', $data);
    }

    public function pdf()
    {
        $mulai   = $this->request->getGet('mulai');
        $selesai = $this->request->getGet('selesai');
        $kebunId = $this->request->getGet('kebun_id');

        $data = $this->laporanService->getLaporan(
            auth()->id(),
            $mulai,
            $selesai,
            $kebunId ? (int) $kebunId : null
        );

        $data['mulai']   = $mulai;
        $data['selesai'] = $selesai;

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);

        $html = view('laporan/pdf', $data);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader(
                'Content-Disposition',
                'inline; filename="laporan-panenku.pdf"'
            )
            ->setBody($dompdf->output());
    }
}