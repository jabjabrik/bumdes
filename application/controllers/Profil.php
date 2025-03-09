<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('base_model');
	}

	public function sejarah()
	{
		$data['title'] = 'Profil Sejarah';
		$this->load->view('profile_view/profile/sejarah', $data);
	}

	public function struktur()
	{
		$data['title'] 			= 'Profil Struktur';
		$data['staff'] = $this->base_model->get_all('staff');
		$this->load->view('profile_view/profile/struktur', $data);
	}

	public function visi_misi()
	{
		$data['title'] = 'Profil Visi & Misi';
		$this->load->view('profile_view/profile/visi_misi', $data);
	}
}
