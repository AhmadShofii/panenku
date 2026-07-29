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
        $user = auth()->user();

        $stats = $this->dashboardService->getStatistics($user->id);

        return view('dashboard/index', [
            'title' => 'Dashboard',
            'user' => $user,
            'stats' => $stats,
        ]);
    }
}