<?php

namespace App\Controllers;

use App\Models\AptoModel;
use App\Models\facturacion;
use App\Models\RegisterUsuariosModel;

class AptoController extends BaseController
{
	public function registerApto()
	{
		$request = \Config\Services::request();
		$registroModel = new RegisterUsuariosModel();
		$aptoModel = new AptoModel();

		//inicializando sesión
		$session = session();

		$idUser = $session->get('id');
		$emailuser = $session->get('email');

		$userData = $registroModel->getUser($emailuser);
		$aptoData = $aptoModel->getApto($idUser);

		echo view('registerApartment', array('user' => $userData));
		echo view('layouts/footer');
	}

	public function addApto()
	{
		$request = \Config\Services::request();
		$aptoModel = new AptoModel();
		$registroModel = new RegisterUsuariosModel();

		$session = session();

		//Recibir datos del form
		$ciudad = $request->getPost('ciudad');
		$pais = $request->getPost('pais');
		$direccion = $request->getPost('direccion');
		$cantidad_personas = $request->getPost('habitantes');
		$estado = $request->getPost('estado');
		$imagen = $request->getPost('imagen');

		$email = $session->get('email');
		$userData = $registroModel->getUser($email);

		$id_propietario = $session->get('id');

		if (strlen($ciudad) < 4 || strlen($pais) < 4 || strlen($direccion) < 10 || strlen($estado) < 9 || $cantidad_personas === '0'  || $ciudad === null  || $pais === null  || $direccion === null  || $cantidad_personas === null || $estado === null) {
			echo '<div class="alert alert-danger m-0" role="alert">No se pudo realizar el registro del apartamento</div>';
			echo view('registerApartment', array('user' => $userData));
			echo view('layouts/footer');
		} else {

			$aptoModel->registerApto($estado, $cantidad_personas, $id_propietario, $ciudad, $pais, $direccion, $imagen);
			$userData = $registroModel->getUser($email);
			$aptoData = $aptoModel->getApto($id_propietario);

			echo '<div class="alert alert-success m-0" role="alert">Apartamento Registrado con éxito</div>';
			echo view('dashboard', array('user' => $userData, 'aparments' => $aptoData));
			echo view('layouts/footer');
		}
	}

	public function updateApto()
	{
		$request = \Config\Services::request();
		$registroModel = new RegisterUsuariosModel();
		$aptoModel = new AptoModel();

		//inicializando sesión
		$session = session();

		$idUser = $session->get('id');
		$emailuser = $session->get('email');

		$ciudad = $request->getPost('ciudad');
		$pais = $request->getPost('pais');
		$direccion = $request->getPost('direccion');
		$estado = $request->getPost('estado');
		$cantidad_personas = $request->getPost('habitantes');
		$imagen = $request->getPost('imagen');
		$id_apartamento = $request->getGet('id');

		$aptoModel->updateApto($estado, $cantidad_personas, $id_apartamento, $ciudad, $pais, $direccion, $imagen);

		$userData = $registroModel->getUser($emailuser);
		$aptoData = $aptoModel->getApto($idUser);

		echo view('dashboard', array('user' => $userData, 'aparments' => $aptoData));
		echo view('layouts/footer');
	}

	public function deleteApto()
	{
		$request = \Config\Services::request();
		$registroModel = new RegisterUsuariosModel();
		$aptoModel = new AptoModel();

		//inicializando sesión
		$session = session();

		$idUser = $session->get('id');
		$emailuser = $session->get('email');

		$id_apartamento = $request->getGet('id');
		$aptoModel->deleteApto($id_apartamento);

		$userData = $registroModel->getUser($emailuser);
		$aptoData = $aptoModel->getApto($idUser);

		echo view('dashboard', array('user' => $userData, 'aparments' => $aptoData));
		echo view('layouts/footer');
	}

	public function pagar()
	{
		$request = \Config\Services::request();
		$aptoModel = new AptoModel();
		$id_apartamento = $request->getGet('id');
		$fecha = $request->getPost('fecha');
		$aptoData = $aptoModel->getAptoId($id_apartamento);
		$pagos = new facturacion();
		$facturacion = $pagos->getPagoId($id_apartamento);
		$pagoAnterior = end($facturacion);
		echo view('factura_view', array('factura' => $aptoData, 'fecha' => $fecha, 'pago' => $pagoAnterior));
	}

	public function addPagos()
	{
		$request = \Config\Services::request();
		$aptoModel = new AptoModel();
		$registroModel = new RegisterUsuariosModel();
		$id_apartamento = $request->getGet('id');
		$fecha_pago = $request->getPost('fechaVencimiento');
		$valor_cuota = $request->getPost('mora');

		$session = session();
		$idUser = $session->get('id');
        $emailuser = $session->get('email');
        $userData = $registroModel->getUser($emailuser);
		$aptoData = $aptoModel->getAptoIds($id_apartamento, $idUser);
		$pagosAptoData = $aptoModel->getPagosApto();
		$pagosData = $aptoModel->getPagos($id_apartamento, $fecha_pago);

		if (count($pagosData) >= 1) {
			echo '<div class="alert alert-danger m-0" role="alert">No se pudo realizar el pago del apartamento, la fecha ingresada ya fue cancelada</div>';
		} else {
			$aptoModel->addPago($fecha_pago, $valor_cuota, $id_apartamento);
			echo '<div class="alert alert-success m-0" role="alert">Pago Realizado con Éxito</div>';
		}
		echo view('pagos', array( 'user' => $userData, 'aparments' => $pagosAptoData));
		echo view('layouts/footer');
	}

	
}

