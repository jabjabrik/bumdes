<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyewa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('base_model');
        authorize_user('bendahara', 'kepala lapak', 'kepala ruko');
    }

    public function index()
    {
        $data['title'] = 'Penyewa';
        $data['data_result'] = $this->base_model->get_all('penyewa', true);

        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');
        $data['id_properti'] = '';

        $this->load->view('admin_view/penyewa/index', $data);
    }

    public function insert()
    {
        $data = [
            'nama_penyewa' => trim($this->input->post('nama_penyewa', true)),
            'no_telepon' => trim($this->input->post('no_telepon', true)),
            'alamat' => trim($this->input->post('alamat', true)),
        ];

        $this->base_model->insert('penyewa', $data);
        redirect('penyewa');
    }

    public function edit()
    {
        $id_penyewa = trim($this->input->post('id_penyewa', true));
        $data = [
            'nama_penyewa' => trim($this->input->post('nama_penyewa', true)),
            'no_telepon' => trim($this->input->post('no_telepon', true)),
            'alamat' => trim($this->input->post('alamat', true)),
        ];

        $this->base_model->update('penyewa', $data, $id_penyewa);
        redirect('penyewa');
    }

    public function nonactive($id_penyewa = null)
    {
        if (is_null($id_penyewa)) show_404();
        $this->base_model->nonactive('penyewa', $id_penyewa);
        redirect('penyewa');
    }
}
