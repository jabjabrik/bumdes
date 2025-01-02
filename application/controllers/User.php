<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'User';

        $data['data_result'] = $this->base_model->get_all('user', true);

        $data['ruko'] = $this->base_model->get_all_properti('ruko');
        $data['lapak'] = $this->base_model->get_all_properti('lapak');

        $data['id_properti'] = '';

        $this->load->view('admin_view/user/index', $data);
    }

    public function edit()
    {
        $id_user   = trim($this->input->post('id_user', true));
        $nama_user = trim($this->input->post('nama_user', true));
        $username  = trim($this->input->post('username', true));
        $password  = trim($this->input->post('password', true));

        // if (strlen($username) < 5) {
        //     set_toasts('Username harus minimal 8 karakter.', 'danger');
        //     redirect($this->service_name);
        // }

        $data = array(
            'nama_user' => $nama_user,
            'username' => $username,
        );

        if (!empty($password)) {
            // if (strlen($password) < 8) {
            //     set_toasts('Password harus minimal 8 karakter.', 'danger');
            //     redirect($this->service_name);
            // } else {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            // }
        }

        // $is_exist_username = (bool)$this->base_model->get_one_data_by($this->service_name, 'username', $username);
        // $is_current_username = $this->base_model->get_one_data_by($this->service_name, 'id_user', $id_user)->username == $username;

        // if ($is_exist_username && !$is_current_username) {
        //     set_toasts("Username '$username' telah terpakai, Mohon gunakan username baru.", 'danger');
        // } else {
        $this->base_model->update('user', $data, $id_user);
        //     set_toasts('User Berhasil di Update', 'success');
        // }

        redirect('user');
    }
}
