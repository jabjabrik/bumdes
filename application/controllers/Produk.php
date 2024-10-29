<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	public function ruko()
	{
		$data['title'] = 'Produk Ruko';
		$this->load->view('produk/ruko', $data);
	}

	public function lapak()
	{
		$data['title'] = 'Produk Lapak';
		$this->load->view('produk/Lapak', $data);
	}
}
