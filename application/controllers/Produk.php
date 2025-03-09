<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('properti_model');
	}

	public function ruko()
	{
		$data['title'] = 'Produk Ruko';
		$data['data_result'] = $this->properti_model->get_properti_detail('ruko');
		$this->load->view('profile_view/produk/ruko', $data);
	}

	public function lapak()
	{
		$data['title'] = 'Produk Lapak';
		$data['data_result'] = $this->properti_model->get_properti_detail('lapak');
		$this->load->view('profile_view/produk/Lapak', $data);
	}
}
