<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('dashboard_model');
        $this->load->model('base_model');
        authorize_user(['bendahara', 'kepala lapak', 'kepala ruko']);
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['total_properti_ruko'] = $this->dashboard_model->get_total_properti('ruko');
        $data['total_properti_lapak'] = $this->dashboard_model->get_total_properti('lapak');
        $data['total_penyewa_ruko'] = $this->dashboard_model->get_total_penyewa('ruko');
        $data['total_penyewa_lapak'] = $this->dashboard_model->get_total_penyewa('lapak');

        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $data['id_properti'] = '';

        $this->load->view('admin_view/dashboard/index', $data);
    }
}
