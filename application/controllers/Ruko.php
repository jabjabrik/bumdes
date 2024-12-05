<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruko extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Ruko';
        $this->load->view('admin_view/ruko/index', $data);
    }
}
