<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Beranda';
		$this->load->view('profile_view/home/index', $data);
	}
}
