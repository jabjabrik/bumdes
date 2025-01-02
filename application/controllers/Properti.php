<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('base_model');
        authorize_user();
    }

    public function index()
    {
        $data['title'] = 'Properti';
        $data['data_result'] = $this->base_model->get_all('properti', true);

        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');
        $data['id_properti'] = '';

        $this->load->view('admin_view/properti/index', $data);
    }

    public function edit()
    {
        $id_properti = trim($this->input->post('id_properti', true));
        $data = [
            'id_properti' => trim($this->input->post('id_properti', true)),
            'nama_properti' => trim($this->input->post('nama_properti', true)),
            'jenis' => trim($this->input->post('jenis', true)),
            'harga' => trim($this->input->post('harga', true)),
        ];

        $foto = $this->base_model->get_one_data_by('properti', 'id_properti', $id_properti)->foto;

        $this->load->library('upload');
        if ($_FILES['foto']['name']) {
            unlink("./file/$foto");
            $data['foto'] = upload_file('foto');
        }

        $this->base_model->update('properti', $data, $id_properti);
        redirect('properti');
    }
}
