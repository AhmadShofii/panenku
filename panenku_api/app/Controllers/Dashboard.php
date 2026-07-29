<?php

namespace App\Controllers;

use App\Services\DashboardService;

class Dashboard extends BaseController
{
    protected DashboardService $dashboardService;

    public function __construct()
    {
        $this->dashboardService = new DashboardService();
    }

    public function index()
    {
        return view('dashboard/index', [
            'title' => 'Dashboard',
            'user'  => auth()->user(),
            'stats' => $this->dashboardService->getStatistics(auth()->id()),
        ]);
    }
}