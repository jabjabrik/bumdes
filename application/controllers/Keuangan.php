<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('base_model');
        $this->load->model('keuangan_model');
        $this->load->library('Dompdf_lib');
        authorize_user(['bendahara']);
    }

    public function index()
    {
        redirect('keuangan/laporan', 'refresh');
    }

    public function laporan($tahun = null)
    {
        $tahun_pembayaran = $this->keuangan_model->get_tahun_pembayaran();
        if (!empty($tahun_pembayaran)) {
            if (is_null($tahun)) {
                redirect("keuangan/laporan/" . end($tahun_pembayaran), 'refresh');
            }

            if (!in_array($tahun, $tahun_pembayaran)) {
                redirect("keuangan/laporan/" . end($tahun_pembayaran), 'refresh');
            }
        }

        $data['data_result'] = $this->keuangan_model->get_transaksi_keuangan($tahun);
        $data['transaksi_kas'] = $this->keuangan_model->get_transaksi_kas($tahun);
        $data['total_saldo'] = end($data['data_result'])->total_saldo ?? 0;
        $data['tahun_pembayaran'] = $tahun_pembayaran;
        $data['tahun'] = $tahun;



        // dd($data);

        $data['title'] = 'Keuangan';

        $data['id_properti'] = '';
        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $this->load->view('admin_view/keuangan/index', $data);
    }

    public function keuangan_insert()
    {
        $tahun = $this->input->post('tahun', true);

        $data = [
            'jenis_transaksi' => $this->input->post('jenis_transaksi', true),
            'tanggal_transaksi' => $this->input->post('tanggal_transaksi', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'jumlah' => $this->input->post('jumlah', true),
        ];

        $this->base_model->insert('transaksi_keuangan', $data);
        redirect("keuangan/laporan/$tahun");
    }


    public function keuangan_delete($id_transaksi_keuangan = null)
    {
        if (is_null($id_transaksi_keuangan)) redirect('dashboard', 'refresh');

        $transaksi_keuangan = $this->base_model->get_one_data_by('transaksi_keuangan', 'id_transaksi_keuangan', $id_transaksi_keuangan);

        if (is_null($transaksi_keuangan)) redirect('dashboard', 'refresh');
        $tanggal_transaksi  = $transaksi_keuangan->tanggal_transaksi;

        $timestamp = strtotime($tanggal_transaksi);
        $tahun = date("Y", $timestamp);

        $this->base_model->delete('transaksi_keuangan', $id_transaksi_keuangan);
        redirect("keuangan/laporan/$tahun");
    }

    public function report($tahun = null)
    {
        $tahun_pembayaran = $this->keuangan_model->get_tahun_pembayaran();

        if (is_null($tahun)) {
            redirect("keuangan/laporan/" . end($tahun_pembayaran), 'refresh');
        }

        if (!in_array($tahun, $tahun_pembayaran)) {
            redirect("keuangan/laporan/" . end($tahun_pembayaran), 'refresh');
        }

        $data['data_result'] = $this->keuangan_model->get_transaksi_keuangan($tahun);
        $data['tahun'] = $tahun;

        // $html = $this->load->view('keuangan/report', $data);
        $html = $this->load->view('keuangan/report', $data, TRUE);

        // Atur DOMPDF
        $this->dompdf_lib->loadHtml($html);
        $this->dompdf_lib->setPaper('A4', 'portrait');
        $this->dompdf_lib->render();

        // Output file PDF
        $this->dompdf_lib->stream("laporan-keuangan-$tahun.pdf", array("Attachment" => 0));
    }
}
