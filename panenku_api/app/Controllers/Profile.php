<?php

namespace App\Controllers;

use App\Services\ProfileService;

class Profile extends BaseController
{
    protected ProfileService $profileService;

    public function __construct()
    {
        $this->profileService = new ProfileService();
    }

    public function index()
    {
        $userId = auth()->id();

        return view('profile/index', [
            'title'   => 'Profile',
            'user'    => $this->profileService->getProfile($userId),
            'stats'   => $this->profileService->getStatistics($userId),
        ]);
    }

    public function edit()
    {
        $userId = auth()->id();

        return view('profile/edit', [
            'title' => 'Edit Profile',
            'user'  => $this->profileService->getProfile($userId),
        ]);
    }

    public function update()
    {
        $userId = auth()->id();

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[30]|is_unique[users.username,id,' . $userId . ']',
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', $this->validator->listErrors());
        }

        $this->profileService->updateProfile($userId, [
            'username' => $this->request->getPost('username'),
        ]);

        return redirect()
            ->to('/profile')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}