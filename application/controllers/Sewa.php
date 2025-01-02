<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sewa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('base_model');
        $this->load->model('sewa_model');
        authorize_user(['bendahara', 'kepala lapak', 'kepala ruko']);
    }

    public function index()
    {
        redirect('sewa/properti/1', 'refresh');
    }

    public function properti($id_properti = null)
    {
        if (empty($id_properti)) {
            redirect('sewa/properti/1', 'refresh');
        }

        $is_exist_id = $this->base_model->get_one_data_by('properti', 'id_properti', $id_properti);

        if (!$is_exist_id) {
            redirect('sewa/properti/1', 'refresh');
        }

        $data_result = $this->sewa_model->get_sewa_properti($id_properti);
        $data['pembayaran_sewa'] = $this->sewa_model->get_pembayaran_sewa($data_result->id_sewa, $data_result->metode_pembayaran);

        // dd($data['pembayaran_sewa']);



        // dd($data['pembayaran_sewa']);

        $data['title'] = 'Sewa ' . ucfirst($data_result->jenis);
        $data['user_role'] = $this->session->userdata('user_role');
        $data['data_result'] = $data_result;

        // dd($data);

        $data['lama_sewa'] = hitung_lama_sewa($data_result->tanggal_mulai, $data_result->tanggal_selesai, $data_result->jenis);
        $data['sisa_waktu_sewa'] = hitung_sisa_waktu_sewa($data_result->tanggal_mulai, $data_result->tanggal_selesai);

        $data['penyewa'] = $this->base_model->get_all('penyewa', true);

        $data['id_properti'] = $id_properti;
        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $this->load->view('admin_view/sewa/index', $data);
    }



    public function utama()
    {
        $data_result;

        $user_role = $this->session->userdata('user_role');
        if ($user_role == 'kepala ruko') {
            $data_result = $this->sewa_model->get_all_properti('ruko');
        } elseif ($user_role == 'kepala lapak') {
            $data_result = $this->sewa_model->get_all_properti('lapak');
        } else {
            $data_result = $this->sewa_model->get_all_properti();
        }

        $data['title'] = 'Utama';
        $data['data_result'] = $data_result;

        $data['id_properti'] = '';
        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $this->load->view('admin_view/sewa/utama', $data);
    }

    public function histori($id_properti = null)
    {
        if (empty($id_properti)) show_404();

        $data['title'] = 'Histori';
        $data['data_result'] = $this->sewa_model->get_histori_properti($id_properti);

        // dd($data);

        // dd($data);

        $data['id_properti'] = $id_properti;
        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $this->load->view('admin_view/sewa/histori', $data);
    }

    public function sewa_insert()
    {
        $id_properti = trim($this->input->post('id_properti', true));
        $id_penyewa = trim($this->input->post('id_penyewa', true));
        $tanggal_mulai = trim($this->input->post('tanggal_mulai', true));
        $lama_sewa = trim($this->input->post('lama_sewa', true));
        $jenis = trim($this->input->post('jenis', true));

        // 
        // tangga_mulai + lama_sewa
        $date = new DateTime($tanggal_mulai);

        if ($jenis == 'ruko') {
            $date->modify("+$lama_sewa year");
        } else {
            $date->modify("+$lama_sewa month");
        }

        $tanggal_selesai = $date->format('Y-m-d');

        $data = [
            'id_properti' => $id_properti,
            'id_penyewa' => $id_penyewa,
            'tanggal_mulai' => $tanggal_mulai,
            'tanggal_selesai' => $tanggal_selesai,
        ];

        $this->load->library('upload');
        $data['dokumen_perjanjian_sewa'] = upload_file('dokumen_perjanjian_sewa');

        $this->base_model->insert('sewa', $data);
        redirect("sewa?id_properti=$id_properti");
    }

    public function sewa_delete($id_sewa = null)
    {
        if (is_null($id_sewa)) show_404();

        $sewa = $this->base_model->get_one_data_by('sewa', 'id_sewa', $id_sewa);
        $id_properti = $sewa->id_properti;
        $bukti_pembayaran = $sewa->bukti_pembayaran;
        $dokumen_perjanjian_sewa = $sewa->dokumen_perjanjian_sewa;

        unlink("./file/$dokumen_perjanjian_sewa");
        $this->base_model->delete('transaksi_keuangan', $id_transaksi_keuangan);

        $transaksi_keuangan = $this->base_model->get_one_data_by('transaksi_keuangan', 'id_sewa', $id_sewa);
        $id_transaksi_keuangan = $transaksi_keuangan->id_transaksi_keuangan;

        if (!is_null($id_transaksi_keuangan)) {
            unlink("./file/$bukti_pembayaran");
            $this->base_model->delete('sewa', $id_sewa);
        }

        redirect("sewa?id_properti=$id_properti");
    }

    public function pembayaran_insert()
    {
        $id_sewa = trim($this->input->post('id_sewa', true));
        $estimasi_harga = trim($this->input->post('estimasi_harga', true));
        $nominal_pembayaran =  trim($this->input->post('nominal_pembayaran', true));
        $tanggal_pembayaran = trim($this->input->post('tanggal_pembayaran', true));
        $id_properti = $this->base_model->get_one_data_by('sewa', 'id_sewa', $id_sewa)->id_properti;

        if ($estimasi_harga != $nominal_pembayaran) {
            $this->session->set_flashdata('alert', 'Nominal harga harus sama dengan nilai estimasi harga');
            redirect("sewa?id_properti=$id_properti");
        }

        $data = [
            'nominal_pembayaran' => $nominal_pembayaran,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'status_pembayaran' => 'lunas',
        ];

        $this->load->library('upload');
        $data['bukti_pembayaran'] = upload_file('bukti_pembayaran');

        $this->base_model->update('sewa', $data, $id_sewa);

        $informasi_sewa = $this->sewa_model->get_informasi_sewa($id_sewa);
        $jenis = $informasi_sewa->jenis;
        $nama_properti = $informasi_sewa->nama_properti;
        $tanggal_mulai = $informasi_sewa->tanggal_mulai;
        $lama_bulan_sewa = hitung_selisih_bulan($informasi_sewa->tanggal_mulai, $informasi_sewa->tanggal_selesai);
        $nama_penyewa = $informasi_sewa->nama_penyewa;

        $deskripsi = "Penerimaan dari hasil sewa properti $jenis ($nama_properti) mulai dari $tanggal_mulai selama $lama_bulan_sewa bulan oleh $nama_penyewa";

        $data_transaksi = [
            'id_sewa' => $id_sewa,
            'tanggal_transaksi' => $tanggal_pembayaran,
            'deskripsi' => $deskripsi,
            'jumlah' => $nominal_pembayaran
        ];

        $this->base_model->insert('transaksi_keuangan', $data_transaksi);
        redirect("sewa?id_properti=$id_properti");
    }

    public function pembayaran_delete($id_sewa = null)
    {
        if (is_null($id_sewa)) show_404();

        $data = [
            'nominal_pembayaran' => null,
            'tanggal_pembayaran' => null,
            'bukti_pembayaran' => null,
            'status_pembayaran' => 'pending',
        ];

        $sewa = $this->base_model->get_one_data_by('sewa', 'id_sewa', $id_sewa);

        $id_properti = $sewa->id_properti;
        $bukti_pembayaran = $sewa->bukti_pembayaran;

        $transaksi_keuangan = $this->base_model->get_one_data_by('transaksi_keuangan', 'id_sewa', $id_sewa);
        $id_transaksi_keuangan = $transaksi_keuangan->id_transaksi_keuangan;

        unlink("./file/$bukti_pembayaran");

        $this->base_model->update('sewa', $data, $id_sewa);
        $this->base_model->delete('transaksi_keuangan', $id_transaksi_keuangan);
        redirect("sewa?id_properti=$id_properti");
    }
}
