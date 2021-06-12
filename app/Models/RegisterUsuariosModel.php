<?php

namespace App\Models;

use CodeIgniter\Model;
use mysqli;

class RegisterUsuariosModel extends Model
{
    function addUser($nameUser,$emailUser,$telephoneUser){
         $sql = "INSERT INTO  propietario (nombre, email, telefono) VALUES ('{$nameUser}', '{$emailUser}', '{$telephoneUser}')";
         $this ->db->query($sql);   
        }

  
}