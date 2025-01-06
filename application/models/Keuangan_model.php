<?php

class Keuangan_model extends CI_Model
{
    public function get_tahun_pembayaran(): array
    {
        $query = "SELECT DISTINCT YEAR(pembayaran.tanggal_pembayaran) AS tahun 
        FROM pembayaran WHERE pembayaran.tanggal_pembayaran IS NOT NULL ORDER BY pembayaran.id_pembayaran DESC;";
        $result = [];
        foreach ($this->db->query($query)->result() as $item) {
            array_push($result, $item->tahun);
        }
        return $result;
    }

    public function get_transaksi_kas($tahun)
    {
        $query = "SELECT 
        SUM(CASE WHEN transaksi_keuangan.jenis_transaksi = 'debit' THEN jumlah ELSE 0 END) AS debit,
        SUM(CASE WHEN transaksi_keuangan.jenis_transaksi = 'kredit' THEN jumlah ELSE 0 END) AS kredit
        FROM transaksi_keuangan
        WHERE YEAR(transaksi_keuangan.tanggal_transaksi) = '$tahun'";

        return $this->db->query($query)->row();
    }

    public function get_transaksi_keuangan($tahun): array
    {
        $query = "SELECT 
        transaksi_keuangan.id_transaksi_keuangan,
        transaksi_keuangan.id_pembayaran,
        transaksi_keuangan.jenis_transaksi,
        transaksi_keuangan.tanggal_transaksi,
        transaksi_keuangan.deskripsi,
        transaksi_keuangan.jumlah,
        (@total := @total + IF(transaksi_keuangan.jenis_transaksi = 'kredit', -transaksi_keuangan.jumlah, transaksi_keuangan.jumlah)) AS total_saldo 
        FROM transaksi_keuangan
        WHERE YEAR(transaksi_keuangan.tanggal_transaksi) = '$tahun'
        ORDER BY transaksi_keuangan.tanggal_transaksi";

        $this->db->query("SET @total := 0;");
        return $this->db->query($query)->result();
    }
}
