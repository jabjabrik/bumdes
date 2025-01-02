<?php

class Keuangan_model extends CI_Model
{
    public function get_transaksi_kas()
    {
        $query = "SELECT 
        SUM(CASE WHEN transaksi_keuangan.jenis_transaksi = 'debit' THEN jumlah ELSE 0 END) AS debit,
        SUM(CASE WHEN transaksi_keuangan.jenis_transaksi = 'kredit' THEN jumlah ELSE 0 END) AS kredit
        FROM transaksi_keuangan";

        return $this->db->query($query)->row();
    }

    public function get_transaksi_keuangan(): array
    {
        $query = "SELECT 
        transaksi_keuangan.id_transaksi_keuangan,
        transaksi_keuangan.id_sewa,
        transaksi_keuangan.jenis_transaksi,
        transaksi_keuangan.tanggal_transaksi,
        transaksi_keuangan.deskripsi,
        transaksi_keuangan.jumlah,
        (@total := @total + IF(transaksi_keuangan.jenis_transaksi = 'kredit', -transaksi_keuangan.jumlah, transaksi_keuangan.jumlah)) AS total_saldo 
        FROM transaksi_keuangan";

        $this->db->query("SET @total := 0;");
        return $this->db->query($query)->result();
    }
}
