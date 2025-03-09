<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
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
        $data['title'] = 'Staff';

        $data['data_result'] = $this->base_model->get_all('staff');

        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $data['id_properti'] = '';

        $this->load->view('admin_view/staff/index', $data);
    }

    public function insert()
    {
        $data = [
            'nama' => trim($this->input->post('nama', true)),
            'jabatan' => trim($this->input->post('jabatan', true)),
        ];

        $data['foto'] = upload_file('foto');

        $this->base_model->insert('staff', $data);
        redirect('staff');
    }

    public function edit()
    {
        $id_staff = trim($this->input->post('id_staff', true));

        $data = [
            'nama' => trim($this->input->post('nama', true)),
            'jabatan' => trim($this->input->post('jabatan', true)),
        ];


        if ($_FILES['foto']['name']) {
            $foto = $this->base_model->get_one_data_by('staff', 'id_staff', $id_staff)->foto;
            unlink("./file/$foto");
            $data['foto'] = upload_file('foto');
        }

        $this->base_model->update('staff', $data, $id_staff);
        redirect('staff');
    }

    public function delete($id_staff = null)
    {
        if (is_null($id_staff)) show_404();
        $foto = $this->base_model->get_one_data_by('staff', 'id_staff', $id_staff)->foto;
        unlink("./file/$foto");
        $this->base_model->delete('staff', $id_staff);
        redirect('staff');
    }
}
