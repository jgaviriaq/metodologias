<?php

namespace App\Models;

use CodeIgniter\Model;

class facturacion extends Model
{
    function getPagoId($id){
        $sql = "SELECT * FROM pagos WHERE id_apartamento={$id}";
        $apto = $this->db->query($sql);
        return $apto->getResultArray();
    }
}
