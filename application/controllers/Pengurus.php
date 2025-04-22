<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('base_model');
        $this->load->library('upload');
        authorize_user();
    }

    public function index()
    {
        $data['title'] = 'Pengurus';

        $data['data_result'] = $this->base_model->get_all('pengurus');

        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $data['id_properti'] = '';

        $this->load->view('admin_view/pengurus/index', $data);
    }

    public function insert()
    {
        $data = [
            'nama' => trim($this->input->post('nama', true)),
            'jabatan' => trim($this->input->post('jabatan', true)),
        ];

        $data['foto'] = upload_file('foto');

        $this->base_model->insert('pengurus', $data);
        redirect('pengurus');
    }

    public function edit()
    {
        $id_pengurus = trim($this->input->post('id_pengurus', true));

        $data = [
            'nama' => trim($this->input->post('nama', true)),
            'jabatan' => trim($this->input->post('jabatan', true)),
        ];


        if ($_FILES['foto']['name']) {
            $foto = $this->base_model->get_one_data_by('pengurus', 'id_pengurus', $id_pengurus)->foto;
            unlink("./file/$foto");
            $data['foto'] = upload_file('foto');
        }

        $this->base_model->update('pengurus', $data, $id_pengurus);
        redirect('pengurus');
    }

    public function delete($id_pengurus = null)
    {
        if (is_null($id_pengurus)) show_404();
        $foto = $this->base_model->get_one_data_by('pengurus', 'id_pengurus', $id_pengurus)->foto;
        unlink("./file/$foto");
        $this->base_model->delete('pengurus', $id_pengurus);
        redirect('pengurus');
    }
}
