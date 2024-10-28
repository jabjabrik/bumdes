<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	public function ruko()
	{
		$data['title'] = 'Produk Ruko';
		$this->load->view('produk/ruko', $data);
	}
}
