<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Lapak';
        $this->load->view('admin_view/lapak/index', $data);
    }
}
