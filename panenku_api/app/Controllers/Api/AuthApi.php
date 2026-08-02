<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class AuthApi extends BaseController
{
    public function login()
    {
        $data = $this->request->getJSON(true);

        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;


        if (!$email || !$password) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Email dan password wajib diisi'
            ]);
        }


        // Cek email dan password menggunakan Shield
        if (!auth()->check([
            'email' => $email,
            'password' => $password
        ])) {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'Email atau password salah'
            ]);
        }


        // Ambil user dari Shield
        $provider = auth()->getProvider();

        $user = $provider->findByCredentials([
            'email' => $email
        ]);


        if (!$user) {

            return $this->response->setJSON([
                'status' => false,
                'message' => 'User tidak ditemukan'
            ]);

        }


        // Generate Access Token Shield v1.4.0
        $token = $user->generateAccessToken(
            'panenku-mobile'
        );


        return $this->response->setJSON([

            'status' => true,

            'message' => 'Login berhasil',

            // raw token untuk Flutter
            'token' => $token->raw_token,


            'data' => [

                'id' => $user->id,

                'email' => $user->getEmail()

            ]

        ]);
    }



    public function register()
    {
        return $this->response->setJSON([

            'status' => true,

            'message' => 'Register API'

        ]);
    }
}