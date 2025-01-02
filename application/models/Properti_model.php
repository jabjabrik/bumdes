<?php

class Properti_model extends CI_Model
{
    public function get_by_properti($id_properti)
    {
        $query = "SELECT properti.*, penyewa.*, sewa.*
        FROM sewa
        JOIN properti ON sewa.id_properti = properti.id_properti
        JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE properti.id_properti = '$id_properti'";

        $result = $this->db->query($query)->row();
        return $result;
    }
}
