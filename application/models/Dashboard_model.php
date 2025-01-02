<?php

class Dashboard_model extends CI_Model
{
    public function get_total_properti($jenis): string
    {
        $query = "SELECT COALESCE(COUNT(properti.id_properti), 0) AS total
        FROM properti 
        WHERE properti.jenis = '$jenis'";
        return $this->db->query($query)->row('total');
    }

    public function get_total_penyewa($jenis): string
    {
        $query = "SELECT COALESCE(COUNT(sewa.id_sewa), 0) AS total
        FROM sewa
        JOIN properti ON sewa.id_properti = properti.id_properti
        WHERE properti.jenis = '$jenis'";
        return $this->db->query($query)->row('total');
    }
}
