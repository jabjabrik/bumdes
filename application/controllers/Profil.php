<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function sejarah()
	{
		$data['title'] = 'Profil Sejarah';
		$this->load->view('profile/sejarah', $data);
	}

	public function struktur()
	{
		$data['title'] = 'Profil Struktur';
		$this->load->view('profile/struktur', $data);
	}

	public function visi_misi()
	{
		$data['title'] = 'Profil Visi & Misi';
		$this->load->view('profile/visi_misi', $data);
	}
}
