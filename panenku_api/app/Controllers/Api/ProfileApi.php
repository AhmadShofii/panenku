<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class ProfileApi extends BaseController
{

    public function index()
    {

        $user=auth()->user();


        if(!$user){

            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'status'=>false,
                    'message'=>'Unauthorized'
                ]);

        }


        return $this->response->setJSON([

            'status'=>true,

            'message'=>'Profile berhasil',

            'data'=>[
                'id'=>$user->id,
                'email'=>$user->getEmail(),
            ]

        ]);

    }

}