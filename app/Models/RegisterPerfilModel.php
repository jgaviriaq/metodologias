<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterPerfilModel extends Model
{
    function addPerfil($nameUser, $cityUser)
    {
        $sql = "INSERT INTO  registeruser (nameUser,cityUser) VALUES ('{$nameUser}', '{$cityUser}')";
        $this->db->query($sql);
    }

    function readPerfil()
    {
        $session = session();
        $id = $session->get('id');
        $sql = "SELECT * FROM propietario where id_propietario = $id";
        $perfil = $this->db->query($sql);
        return $perfil->getResult();
    }

    function updatePerfil($id, $nombre, $telefono, $image)
    {
        $sql = "UPDATE propietario SET nombre='{$nombre}',telefono='{$telefono}',image='{$image}'WHERE id_propietario='{$id}'";
        $this->db->query($sql);
    }
}
