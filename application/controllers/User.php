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

    public function insert()
    {
        $username = htmlspecialchars($this->input->post('username', true));

        $is_exist_username = (bool)$this->base_model->get_one_data_by('user', 'username', $username);
        if ($is_exist_username) redirect('user');

        $password = htmlspecialchars($this->input->post('password', true));
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $nama_user = htmlspecialchars($this->input->post('nama_user', true));
        $role = htmlspecialchars($this->input->post('role', true));

        $data = [
            'username' => $username,
            'password' => $hashed_password,
            'nama_user' => $nama_user,
            'role' => $role,
        ];

        $this->base_model->insert('user', $data);
        redirect('user');
    }

    public function edit()
    {
        $id_user = htmlspecialchars($this->input->post('id_user', true));
        $username = htmlspecialchars($this->input->post('username'));

        $is_exist_username = (bool)$this->base_model->get_one_data_by('user', 'username', $username);
        $user = $this->base_model->get_one_data_by('user', 'id_user', $id_user);

        if ($is_exist_username && $username != $user->username) redirect('user');

        $nama_user = htmlspecialchars($this->input->post('nama_user', true));

        $role = htmlspecialchars($this->input->post('role', true));

        $data = [
            'username' => $username,
            'nama_user' => $nama_user,
            'role' => $role,
        ];

        $password = htmlspecialchars($this->input->post('password', true));
        if ($password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $data['password'] = $hashed_password;
        }

        $this->base_model->update('user', $data, $id_user);
        redirect('user');
    }

    public function delete($id_user = null)
    {
        if (is_null($id_user)) show_404();
        $this->base_model->delete('user', $id_user);
        redirect('user');
    }
}
