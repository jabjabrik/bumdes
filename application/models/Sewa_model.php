<?php

class Sewa_model extends CI_Model
{
    public function get_all_properti($jenis_properti = null)
    {
        $where = "AND IF(sewa.id_sewa IS NOT NULL, IF(sewa.status_sewa = 'berlangsung', sewa.status_sewa = 'berlangsung', 1), 1)";

        if ($jenis_properti == 'ruko') {
            $where .= "AND properti.jenis = '$jenis_properti'";
        }

        if ($jenis_properti == 'lapak') {
            $where .= "AND properti.jenis = '$jenis_properti'";
        }

        // $query = "SELECT properti.id_properti AS id_properti_, properti.*, penyewa.*, sewa.*
        // FROM properti
        // LEFT JOIN sewa ON properti.id_properti = sewa.id_properti
        // LEFT JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        // WHERE 1=1 $where";
        $query = "SELECT properti.id_properti,properti.nama_properti, properti.jenis, properti.alamat_properti, sewa.id_sewa, penyewa.nama_penyewa
        FROM properti
        LEFT JOIN (
            SELECT *
            FROM sewa
            WHERE status_sewa = 'berlangsung'
        ) AS sewa ON properti.id_properti = sewa.id_properti
        LEFT JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE 1=1 $where
        ORDER BY id_properti";

        $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_sewa_properti($id_properti)
    {
        $query = "SELECT properti.*, penyewa.*, sewa.*
        FROM properti
        JOIN sewa ON properti.id_properti = sewa.id_properti
        JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE properti.id_properti = '$id_properti' AND sewa.status_sewa = 'berlangsung'";

        $result = $this->db->query($query)->row();
        return $result;
    }

    public function get_riwayat_sewa($id_sewa)
    {
        $query = "SELECT properti.*, penyewa.*, sewa.*
        FROM sewa
        JOIN properti ON sewa.id_properti = properti.id_properti
        JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE sewa.id_sewa = '$id_sewa'";

        return $this->db->query($query)->row();
    }



    public function check_status_sewa($id_properti)
    {
        $query = "SELECT sewa.id_sewa FROM sewa
        WHERE sewa.id_properti = '$id_properti' AND sewa.status_sewa = 'berlangsung'";
        return (bool)$this->db->query($query)->num_rows();
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

    public function get_riwayat_properti($id_properti)
    {
        $query = "SELECT properti.*, penyewa.*, sewa.*
        FROM properti
        JOIN sewa ON properti.id_properti = sewa.id_properti
        JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE properti.id_properti = '$id_properti' AND sewa.status_sewa = 'selesai'";

        $result = $this->db->query($query)->result();
        return $result;
    }

    public function get_informasi_pembayaran($id_pembayaran): object
    {
        $query = "SELECT sewa.*, properti.*, penyewa.*, pembayaran.*
        FROM pembayaran
        JOIN sewa ON pembayaran.id_sewa = sewa.id_sewa
        JOIN properti ON sewa.id_properti = properti.id_properti
        JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
        WHERE pembayaran.id_pembayaran = '$id_pembayaran'";
        return $this->db->query($query)->row();
    }

    public function insert_sewa_pembayaran($data, $jenis, $lama_sewa, $tanggal_mulai): void
    {
        $metode_pembayaran = $data['metode_pembayaran'];
        $this->db->insert('sewa', $data);
        $id_sewa = $this->db->insert_id();
        if ($metode_pembayaran == 'periode bulanan') {
            $periode_bulan = $jenis == 'ruko' ? $lama_sewa * 12 : $lama_sewa;
            foreach (range(1, $periode_bulan) as $i) {
                $jatuh_tempo = new DateTime($tanggal_mulai);
                $jatuh_tempo->modify('+' . ($i - 1) . ' month');
                $tanggal_jatuh_tempo = $jatuh_tempo->format('Y-m-d'); // simpan sebagai string

                $data = [
                    'id_sewa' => $id_sewa,
                    'periode' => $i,
                    'jatuh_tempo' => $tanggal_jatuh_tempo,
                ];
                $this->db->insert('pembayaran', $data);
            }
        } else {
            $this->db->insert('pembayaran', ['id_sewa' => $id_sewa]);
        }
    }
}
