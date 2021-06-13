<?php

namespace App\Models;

use CodeIgniter\Model;
use mysqli;

class RegisterUsuariosModel extends Model
{
    function addUser($nameUser,$emailUser,$telephoneUser, $password){
          $sql = "INSERT INTO  propietario (nombre,email,telefono,password) VALUES ('{$nameUser}','{$emailUser}','{$telephoneUser}','{$password}')";
         $this ->db->query($sql);   
        }

        function emailRepetidos($email){
            $sql = "SELECT * FROM propietario WHERE email='{$email}'";
            $rol = $this->db->query($sql);
            return $rol->getResult();
        }
  
}