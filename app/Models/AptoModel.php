<?php

namespace App\Models;

use CodeIgniter\Model;

class AptoModel extends Model
{
    function getAllAptos(){
        
        $sql = "SELECT * FROM apartamentos";
        $apartamento = $this->db->query($sql);

        return $apartamento->getResultArray();
    }

    function getApto($idUser)
    {
        $sql = "SELECT * FROM apartamentos WHERE id_propietario = {$idUser}";
        $apartamento = $this->db->query($sql);

        return $apartamento->getResultArray();
    }

    function getAptoId($id){
        $sql = "SELECT * FROM apartamentos WHERE id_apartamento={$id}";
        $apto = $this->db->query($sql);
        return $apto->getResultArray();
    }

    function registerApto($estado, $cantidad_personas, $id_propietario, $ciudad, $pais, $direccion, $imagen)
    {
        $sql = "INSERT INTO apartamentos (estado, cantidad_personas, id_propietario, ciudad, pais, direccion, imagen) VALUES ('{$estado}','{$cantidad_personas}', '{$id_propietario}','{$ciudad}', '{$pais}', '{$direccion}', '{$imagen}')";

        $this->db->query($sql);
    }

    function updateApto($estado, $cantidad_personas, $id_apartamento, $ciudad, $pais, $direccion, $imagen){
        $sql = "UPDATE apartamentos SET estado = '{$estado}', cantidad_personas = '{$cantidad_personas}', ciudad ='{$ciudad}', pais = '{$pais}', direccion = '{$direccion}',  imagen = '{$imagen}' WHERE id_apartamento='{$id_apartamento}'";

        $this->db->query($sql);
    }

    function deleteApto($id_apartamento){
        $sql = "DELETE FROM apartamentos WHERE id_apartamento='{$id_apartamento}'";

        $this->db->query($sql);
    }
};
