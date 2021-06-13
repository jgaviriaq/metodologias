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
        $nameUser = $request->getPost('user');
        $emailuser = $request->getPost('emailuser');
        $telephoneuser = $request->getPost('telephoneuser');
        $password = $request->getPost("passworduser");
        $datos = base_url() . '/public/registerUser';
        $emailRepetidos=$registroModel->emailRepetidos($emailuser);
        if($emailRepetidos[0]->email !=$emailuser){
            $registroModel->addUser($nameUser, $emailuser, $telephoneuser, $password);
            return redirect()->to($datos);
        }else{
            echo view('errorEmailRepetidos_view');
            echo view('layouts/footer');
        }



       
    }
}
