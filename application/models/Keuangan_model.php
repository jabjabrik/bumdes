<?php

class Keuangan_model extends CI_Model
{
    public function get_tahun_pembayaran(): array
    {
        $query = "SELECT DISTINCT YEAR(transaksi_keuangan.tanggal_transaksi) AS tahun 
        FROM transaksi_keuangan 
        ORDER BY transaksi_keuangan.id_transaksi_keuangan DESC;";
        $result = [];
        foreach ($this->db->query($query)->result() as $item) {
            array_push($result, $item->tahun);
        }
        return $result;
    }

    public function get_transaksi_kas($tahun)
    {
        $where = "";
        if ($tahun != 'all') {
            $where .= "AND YEAR(transaksi_keuangan.tanggal_transaksi) = '$tahun'";
        }

        $query = "SELECT 
        SUM(CASE WHEN transaksi_keuangan.jenis_transaksi = 'debit' THEN jumlah ELSE 0 END) AS debit,
        SUM(CASE WHEN transaksi_keuangan.jenis_transaksi = 'kredit' THEN jumlah ELSE 0 END) AS kredit
        FROM transaksi_keuangan
        WHERE 1=1 $where";

        return $this->db->query($query)->row();
    }

    public function get_transaksi_keuangan($tahun): array
    {
        $where = "";
        if ($tahun != 'all') {
            $where .= "AND YEAR(transaksi_keuangan.tanggal_transaksi) = '$tahun'";
        }

        $query = "SELECT 
        transaksi_keuangan.id_transaksi_keuangan,
        transaksi_keuangan.id_pembayaran,
        transaksi_keuangan.jenis_transaksi,
        transaksi_keuangan.tanggal_transaksi,
        transaksi_keuangan.deskripsi,
        transaksi_keuangan.jumlah,
        (@total := @total + IF(transaksi_keuangan.jenis_transaksi = 'kredit', -transaksi_keuangan.jumlah, transaksi_keuangan.jumlah)) AS total_saldo 
        FROM transaksi_keuangan
        WHERE 1=1 $where
        ORDER BY transaksi_keuangan.tanggal_transaksi";

        $this->db->query("SET @total := 0;");
        return $this->db->query($query)->result();
    }
}
