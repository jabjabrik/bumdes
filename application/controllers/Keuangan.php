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
        authorize_user(['bendahara']);
    }

    public function index()
    {
        $data['data_result'] = $this->keuangan_model->get_transaksi_keuangan();
        $data['transaksi_kas'] = $this->keuangan_model->get_transaksi_kas();
        $data['total_saldo'] = end($data['data_result'])->total_saldo;

        // dd($data);

        $data['title'] = 'Keuangan';

        $data['id_properti'] = '';
        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $this->load->view('admin_view/keuangan/index', $data);
    }
}
