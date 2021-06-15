<?php

namespace App\Controllers;

use App\Models\RegisterUsuariosModel;
use App\Models\AptoModel;

class RegisterUsuariosController extends BaseController
{
    public function index()
    {
        echo view('layouts/header');
        echo view('registerUsuarios_view');
        echo view('layouts/footer');
    }

    public function login()
    {
        echo view('layouts/header');
        echo view('login');
        echo view('layouts/footer');
    }

    public function SignIn()
    {
        $request = \Config\Services::request();
        $registroModel = new RegisterUsuariosModel();
        $aptoModel = new AptoModel();

        $emailuser = $request->getPost('emailuser');
        $password = $request->getPost("passworduser");


        //Encriptar contraseña
        $sha = sha1($password);

        //inicializando sesión
        $session = session();

        // //trayendo datos del modelo
        $userData = $registroModel->getUser($emailuser);


        // //Comparar contraseña del input con la BD
        $hash =  password_hash($sha, CRYPT_BLOWFISH);

        if (password_verify($userData[0]['password'], $hash)) {
            $newData = [
                'email' => $emailuser,
                'id' => $userData[0]['id_propietario'],
                'nombre' => $userData[0]['nombre'],
                'logged_in' => TRUE
            ];
            $session->set($newData);
            $idUser = $session->get('id');

            $aptoData = $aptoModel->getApto($idUser);
            // echo view('layouts/header');
            echo view('dashboard',  array('user' => $userData, 'aparments'=>$aptoData));
            echo view('layouts/footer');
        } else {
            echo '<div class="alert alert-danger" role="alert">Correo y/o constraseña invalidos</div>';
            return view('/');
        };
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
        $emailRepetidos = $registroModel->emailRepetidos($emailuser);
        if ($emailRepetidos[0]->email != $emailuser) {
            $registroModel->addUser($nameUser, $emailuser, $telephoneuser, $password);
            return redirect()->to($datos);
        } else {
            echo view('errorEmailRepetidos_view');
            echo view('layouts/footer');
        }
    }

    public function dashboard()
    {
        $registroModel = new RegisterUsuariosModel();
        $aptoModel = new AptoModel();

         //inicializando sesión
         $session = session();
         
         $idUser = $session->get('id');
         $emailuser = $session->get('email');

         if ($session->get('email') != "" || $session->get('email') != null) {
			// //trayendo datos del modelo
            $userData = $registroModel->getUser($emailuser);
            $aptoData = $aptoModel->getApto($idUser);
    
            echo view('dashboard', array('user' => $userData, 'aparments'=>$aptoData));
            echo view('layouts/footer');
		} else {
			echo view('layouts/header');
			echo "<h1 class=' mt-5 text-center text-danger'>404 </h1>";
			echo "<h1 class='text-center text-danger'>PAGE NOT FOUND </h1>";
			echo view('layouts/footer');
		}

         
    }

    public function signOut()
    {

        $session = session();
        $newData = [
            'logged_in' => FALSE
        ];
        $session->set($newData);
        $session->destroy();

        echo view('layouts/header');
        echo view('registerUsuarios_view');
        echo view('layouts/footer');
    }

    public function profile()
    {
        echo view('profile');
    }
}
