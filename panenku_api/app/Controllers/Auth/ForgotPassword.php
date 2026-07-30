<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class ForgotPassword extends BaseController
{
    public function index()
    {
        return view('auth/forgot_password',[
            'title'=>'Forgot Password'
        ]);
    }

    public function send()
    {
        return redirect()
            ->back()
            ->with(
                'success',
                'Link reset password telah dikirim.'
            );
    }
}