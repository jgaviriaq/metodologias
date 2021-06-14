<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('layouts/header');
        echo view('registerUsuarios_view');
        echo view('layouts/footer');
	}
}
