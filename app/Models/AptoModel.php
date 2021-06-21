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

    function getAptoIds($id, $idUser){
        $sql = "SELECT * FROM apartamentos WHERE id_apartamento={$id} AND id_propietario = {$idUser}";
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

    function addPago($fecha_pago, $valor_cuota,$id_apartamento)
    {
        $sql = "INSERT INTO  pagos (id_apartamento, fecha_pago, valor_cuota) VALUES ('{$id_apartamento}', '{$fecha_pago}','{$valor_cuota}')";
        $this->db->query($sql);
    }

    function getPagos($id_apartamento, $fecha_pago){
        $sql = "SELECT * FROM pagos WHERE id_apartamento='{$id_apartamento}' AND fecha_pago='{$fecha_pago}'";
        $pago = $this->db->query($sql);
        return $pago->getResultArray();
    }

    function getPagosApto(){
        $sql = "SELECT `id`, pagos.`id_apartamento`, `fecha_pago`, `valor_cuota`,`estado`, `cantidad_personas`, `id_propietario`, `ciudad`, `pais`, `direccion` FROM `pagos` INNER join apartamentos on pagos.id_apartamento = apartamentos.id_apartamento ORDER BY fecha_pago ASC, pagos.id_apartamento";
        $pagos = $this->db->query($sql);
        return $pagos->getResultArray();
    }
};
