<?php

class Sewa_model extends CI_Model
{
    public function get_all_properti($jenis_properti = null)
    {
        $where = "WHERE IF(sewa.id_sewa IS NOT NULL, sewa.status_sewa = 'berlangsung', 1)";

        if ($jenis_properti == 'ruko') {
            $where .= "WHERE properti.jenis = '$jenis_properti'";
        }

        if ($jenis_properti == 'lapak') {
            $where .= "WHERE properti.jenis = '$jenis_properti'";
        }

        $query = "SELECT properti.id_properti AS id_properti_, properti.*, penyewa.*, sewa.*
        FROM properti
        LEFT JOIN sewa ON properti.id_properti = sewa.id_properti
        LEFT JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        $where";

        $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_sewa_properti($id_properti)
    {
        $query = "SELECT properti.id_properti AS id_properti_, properti.*, penyewa.*, sewa.*
        FROM properti
        LEFT JOIN sewa ON properti.id_properti = sewa.id_properti
        LEFT JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE properti.id_properti = '$id_properti' AND IF(sewa.id_sewa IS NOT NULL, sewa.status_sewa = 'berlangsung', 1)";

        $result = $this->db->query($query)->row();
        return $result;
    }

    public function get_pembayaran_sewa($id_sewa, $metode_pembayaran)
    {
        $query = "SELECT pembayaran.* 
        FROM sewa
        JOIN pembayaran ON sewa.id_sewa = pembayaran.id_sewa
        WHERE sewa.id_sewa = '$id_sewa'";
        $result = $this->db->query($query);
        return $metode_pembayaran == 'kontan' ? $result->row() : $result->result();
    }

    public function get_histori_properti($id_properti)
    {
        $query = "SELECT properti.id_properti AS id_properti_, properti.*, penyewa.*, sewa.*
        FROM properti
        JOIN sewa ON properti.id_properti = sewa.id_properti
        JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE properti.id_properti = '$id_properti'";

        $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_informasi_sewa($id_sewa): object
    {
        $query = "SELECT sewa.*, properti.*, penyewa.*
        FROM sewa
        JOIN properti ON sewa.id_properti = properti.id_properti
        JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE sewa.id_sewa = '$id_sewa'";
        return $this->db->query($query)->row();
    }
}
