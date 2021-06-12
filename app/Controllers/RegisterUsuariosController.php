<?php

namespace App\Controllers;

use App\Models\RegisterUsuariosModel;


class RegisterUsuariosController extends BaseController
{
    public function index()
    {
        echo view('layouts/header');
        echo view('registerUsuarios_view');
        echo view('layouts/footer');
    }

    public function addPropietario()
    {
        $request = \Config\Services::request();
        $registroModel = new RegisterUsuariosModel();
        $user = $request->getPost('user');
        $emailuser = $request->getPost('emailuser');
        $telephoneuser = $request->getPost('telephoneuser');
        $registroModel->addUser($user, $emailuser, $telephoneuser);
    }
}
