<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('base_model');
	}

	public function ruko()
	{
		$data['title'] = 'Produk Ruko';
		$data['data_result'] = $this->base_model->get_all_properti('ruko');
		$this->load->view('profile_view/produk/ruko', $data);
	}

	public function lapak()
	{
		$data['title'] = 'Produk Lapak';
		$data['data_result'] = $this->base_model->get_all_properti('lapak');
		$this->load->view('profile_view/produk/Lapak', $data);
	}
}
