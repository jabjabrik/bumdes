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

    public function properti($id_properti = null, $id_sewa = null)
    {
        if (empty($id_properti)) {
            redirect('sewa/properti/1', 'refresh');
        }

        $properti = $this->base_model->get_one_data_by('properti', 'id_properti', $id_properti);
        $user_role = $this->session->userdata('user_role');
        $sewa;

        if (is_null($properti)) {
            redirect('sewa/properti/1', 'refresh');
        }

        if ($properti->jenis == 'ruko' && $user_role == 'kepala lapak') {
            redirect('dashboard', 'refresh');
        }

        if ($properti->jenis == 'lapak' && $user_role == 'kepala ruko') {
            redirect('dashboard', 'refresh');
        }

        if (!is_null($id_sewa)) {
            $sewa = $this->base_model->get_one_data_by('sewa', 'id_sewa', $id_sewa);
            if (is_null($sewa)) {
                redirect('sewa/properti/1', 'refresh');
            }
        }

        $status_sewa = $this->sewa_model->check_status_sewa($id_properti);
        $data_result;

        if ($status_sewa) {
            $data_result = $this->sewa_model->get_sewa_properti($id_properti);
            $data['pembayaran_sewa'] = $this->sewa_model->get_pembayaran_sewa($data_result->id_sewa, $data_result->metode_pembayaran);
            $data['lama_sewa'] = hitung_lama_sewa($data_result->tanggal_mulai, $data_result->tanggal_selesai, $data_result->jenis);
            $data['sisa_waktu_sewa'] = hitung_sisa_waktu_sewa($data_result->tanggal_mulai, $data_result->tanggal_selesai);
            $angsuran_sebulan = '';
            if ($data_result->metode_pembayaran == 'periode bulanan') {
                if ($data_result->jenis == 'ruko') {
                    $angsuran_sebulan .= $data_result->harga * $data['lama_sewa'] / count($data['pembayaran_sewa']);
                } else {
                    $angsuran_sebulan .= $data_result->harga;
                }
            }

            $data['angsuran_sebulan'] = $angsuran_sebulan;
        } else {
            $data_result = $properti;
        }


        $data['title'] = 'Sewa ' . ucfirst($data_result->jenis);
        $data['user_role'] = $user_role;
        $data['data_result'] = $data_result;

        $data['penyewa'] = $this->base_model->get_all('penyewa', true);

        $data['id_properti'] = $id_properti;
        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $this->load->view('admin_view/sewa/index', $data);
    }

    public function detail_riwayat($id_sewa = null)
    {
        if (empty($id_sewa)) {
            redirect('sewa/properti/1', 'refresh');
        }

        $data_result = $this->sewa_model->get_riwayat_sewa($id_sewa);

        if (is_null($data_result) || $data_result->status_sewa == 'berlangsung') {
            redirect('sewa/properti/1', 'refresh');
        }

        $data['pembayaran_sewa'] = $this->sewa_model->get_pembayaran_sewa($data_result->id_sewa, $data_result->metode_pembayaran);
        $data['lama_sewa'] = hitung_lama_sewa($data_result->tanggal_mulai, $data_result->tanggal_selesai, $data_result->jenis);


        $data['title'] = 'Riwayat ' . ucfirst($data_result->jenis);
        $data['data_result'] = $data_result;

        $data['id_properti'] = '';
        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $this->load->view('admin_view/sewa/riwayat_detail', $data);
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

    public function riwayat($id_properti = null)
    {
        if (empty($id_properti)) show_404();

        $data['title'] = 'Riwayat';
        $data['data_result'] = $this->sewa_model->get_riwayat_properti($id_properti);

        $data['id_properti'] = $id_properti;
        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $this->load->view('admin_view/sewa/riwayat', $data);
    }

    public function sewa_insert()
    {
        $id_properti = trim($this->input->post('id_properti', true));
        $id_penyewa = trim($this->input->post('id_penyewa', true));
        $tanggal_mulai = trim($this->input->post('tanggal_mulai', true));
        $lama_sewa = trim($this->input->post('lama_sewa', true));
        $jenis = trim($this->input->post('jenis', true));
        $metode_pembayaran = trim($this->input->post('metode_pembayaran', true));

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
            'metode_pembayaran' => $metode_pembayaran,
        ];

        $this->load->library('upload');
        $data['dokumen_perjanjian_sewa'] = upload_file('dokumen_perjanjian_sewa');

        $this->sewa_model->insert_sewa_pembayaran($data, $jenis, $lama_sewa);
        redirect("sewa/properti/$id_properti");
    }

    public function sewa_delete($id_sewa = null)
    {
        if (is_null($id_sewa)) redirect('sewa/properti/1', 'refresh');

        $sewa = $this->base_model->get_one_data_by('sewa', 'id_sewa', $id_sewa);
        $id_properti = $sewa->id_properti;

        if (is_null($sewa)) {
            redirect('sewa/properti/1', 'refresh');
        }

        $this->base_model->delete('sewa', $id_sewa);

        redirect("sewa/properti/$id_properti");



        // $bukti_pembayaran = $sewa->bukti_pembayaran;
        // $dokumen_perjanjian_sewa = $sewa->dokumen_perjanjian_sewa;

        // unlink("./file/$dokumen_perjanjian_sewa");
        // $this->base_model->delete('transaksi_keuangan', $id_transaksi_keuangan);

        // $transaksi_keuangan = $this->base_model->get_one_data_by('transaksi_keuangan', 'id_sewa', $id_sewa);
        // $id_transaksi_keuangan = $transaksi_keuangan->id_transaksi_keuangan;

        // if (!is_null($id_transaksi_keuangan)) {
        //     unlink("./file/$bukti_pembayaran");
        //     $this->base_model->delete('sewa', $id_sewa);
        // }

    }


    public function sewa_selesai($id_sewa = null)
    {
        if (is_null($id_sewa)) redirect('sewa/properti/1', 'refresh');

        $sewa = $this->base_model->get_one_data_by('sewa', 'id_sewa', $id_sewa);
        $id_properti = $sewa->id_properti;

        if (is_null($sewa)) {
            redirect('sewa/properti/1', 'refresh');
        }

        $data = ['status_sewa ' => 'selesai'];
        $this->base_model->update('sewa', $data, $id_sewa);

        redirect("sewa/properti/$id_properti");
    }

    public function pembayaran_insert()
    {
        $id_pembayaran = trim($this->input->post('id_pembayaran', true));
        $id_properti = trim($this->input->post('id_properti', true));
        $id_sewa = trim($this->input->post('id_sewa', true));
        $periode = trim($this->input->post('periode', true));
        $tanggal_pembayaran = trim($this->input->post('tanggal_pembayaran', true));
        $nominal_pembayaran = trim($this->input->post('nominal_pembayaran', true));

        $data = [
            'nominal_pembayaran' => $nominal_pembayaran,
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'status_pembayaran' => 'lunas',
        ];

        $this->load->library('upload');
        $data['bukti_pembayaran'] = upload_file('bukti_pembayaran');

        $this->base_model->update('pembayaran', $data, $id_pembayaran);

        $informasi_pembayaran = $this->sewa_model->get_informasi_pembayaran($id_pembayaran);
        $jenis = $informasi_pembayaran->jenis;
        $nama_properti = $informasi_pembayaran->nama_properti;
        $tanggal_mulai = $informasi_pembayaran->tanggal_mulai;
        $lama_sewa = hitung_lama_sewa($informasi_pembayaran->tanggal_mulai, $informasi_pembayaran->tanggal_selesai, $jenis) . " " . ($jenis == 'ruko' ? 'tahun' : 'bulan');
        $nama_penyewa = $informasi_pembayaran->nama_penyewa;
        $metode_pembayaran = $informasi_pembayaran->metode_pembayaran;
        $periode = sprintf("%02d", $informasi_pembayaran->periode);

        $deskripsi = "";

        if ($metode_pembayaran == 'kontan') {
            $deskripsi .= "Penerimaan dari pembayaran kontan $jenis ($nama_properti), dimulai dari $tanggal_mulai selama $lama_sewa, oleh $nama_penyewa";
        } else {
            $deskripsi .= "Penerimaan dari pembayaran cicilan $jenis ($nama_properti) periode bulan-$periode, dimulai dari $tanggal_mulai selama $lama_sewa, oleh $nama_penyewa";
        }

        $data_transaksi = [
            'id_pembayaran' => $id_pembayaran,
            'tanggal_transaksi' => $tanggal_pembayaran,
            'deskripsi' => $deskripsi,
            'jumlah' => $nominal_pembayaran
        ];

        $this->base_model->insert('transaksi_keuangan', $data_transaksi);
        redirect("sewa/properti/$id_properti");
    }

    public function pembayaran_delete($id_pembayaran = null)
    {
        if (is_null($id_pembayaran)) redirect('sewa/properti/1', 'refresh');

        $data = [
            'nominal_pembayaran' => null,
            'tanggal_pembayaran' => null,
            'bukti_pembayaran' => null,
            'status_pembayaran' => 'pending',
        ];

        $pembayaran = $this->base_model->get_one_data_by('pembayaran', 'id_pembayaran', $id_pembayaran);
        $sewa = $this->base_model->get_one_data_by('sewa', 'id_sewa', $pembayaran->id_sewa);

        $bukti_pembayaran = $pembayaran->bukti_pembayaran;
        $id_properti = $sewa->id_properti;

        // $transaksi_keuangan = $this->base_model->get_one_data_by('transaksi_keuangan', 'id_sewa', $id_sewa);
        // $id_transaksi_keuangan = $transaksi_keuangan->id_transaksi_keuangan;

        unlink("./file/$bukti_pembayaran");

        $this->base_model->update('pembayaran', $data, $id_pembayaran);
        // $this->base_model->delete('transaksi_keuangan', $id_transaksi_keuangan);
        redirect("sewa/properti/$id_properti");
    }
}
