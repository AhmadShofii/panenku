<?php

namespace App\Controllers;

use CodeIgniter\Shield\Models\UserModel;

class Profile extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function index()
    {
        $user = auth()->user();

        return view('profile/index', [
            'title' => 'Profile',
            'user'  => $user,
            'stats' => [
                'totalKebun' => 0,
                'totalPanenKg' => 0,
                'totalPendapatan' => 0,
            ]
        ]);
    }


    public function edit()
    {
        return view('profile/edit', [
            'title' => 'Edit Profile',
            'user'  => auth()->user(),
        ]);
    }


    public function update()
    {
        $rules = [
            'username' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Username wajib diisi.',
                    'min_length' => 'Username minimal 3 karakter.',
                ]
            ],
        ];


        if (!$this->validate($rules)) {

            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());

        }


        $user = auth()->user();


        $user->username = $this->request->getPost('username');


        $this->userModel->save($user);


        return redirect()
            ->to('/profile')
            ->with('success', 'Profile berhasil diperbarui.');

    }



    public function password()
    {
        return view('profile/password', [
            'title' => 'Ubah Password',
            'user'  => auth()->user(),
        ]);
    }




    public function updatePassword()
    {

        $rules = [

            'password_lama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password lama wajib diisi.'
                ]
            ],


            'password_baru' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password baru wajib diisi.',
                    'min_length' => 'Password minimal 8 karakter.'
                ]
            ],


            'konfirmasi_password' => [
                'rules' => 'required|matches[password_baru]',
                'errors' => [
                    'required' => 'Konfirmasi password wajib diisi.',
                    'matches' => 'Konfirmasi password tidak sama.'
                ]
            ]

        ];



        if (!$this->validate($rules)) {

            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());

        }



        $user = auth()->user();



        if (!password_verify(
            $this->request->getPost('password_lama'),
            $user->password_hash
        )) {

            return redirect()
                ->back()
                ->with('error','Password lama salah.');

        }



        $user->password_hash = password_hash(
            $this->request->getPost('password_baru'),
            PASSWORD_DEFAULT
        );



        $this->userModel->save($user);



        return redirect()
            ->to('/profile')
            ->with('success','Password berhasil diubah.');

    }

}