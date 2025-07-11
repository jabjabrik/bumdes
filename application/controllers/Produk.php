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
		$nik = $this->input->post('nik');
		$this->_get_properti_data($nik, 'ruko');
		$data['title'] = 'Produk Ruko';
		$data['data_result'] = $this->properti_model->get_properti_detail('ruko');
		$this->load->view('profile_view/produk/ruko', $data);
	}

	public function lapak()
	{
		$nik = $this->input->post('nik');
		$this->_get_properti_data($nik, 'lapak');
		$data['title'] = 'Produk Lapak';
		$data['data_result'] = $this->properti_model->get_properti_detail('lapak');
		$this->load->view('profile_view/produk/Lapak', $data);
	}

	private function _get_properti_data($nik, $jenis_properti)
	{
		if (isset($nik)) {
			$nik = trim($nik);

			if (empty($nik)) {
				$this->session->set_flashdata('alertModal', 'NIK tidak boleh kosong');
				redirect("produk/$jenis_properti", 'refresh');
			}

			$pattern = '/^\d{16}$/';
			if (!preg_match($pattern, $nik)) {
				$this->session->set_flashdata('alertModal', 'Format Penulisan NIK Tidak Sesuai.');
				redirect("produk/$jenis_properti", 'refresh');
			}

			$penyewa = $this->db->get_where('penyewa', ['nik' => $nik]);
			if (empty($penyewa->num_rows())) {
				$this->session->set_flashdata('alertModal', 'NIK tidak ditemukan');
				redirect("produk/$jenis_properti", 'refresh');
			}

			$query = "SELECT properti.*, penyewa.*, sewa.*
			FROM properti
			JOIN sewa ON properti.id_properti = sewa.id_properti
			JOIN penyewa ON sewa.id_penyewa = penyewa.id_penyewa
			WHERE penyewa.nik = '$nik' AND sewa.status_sewa = 'berlangsung' AND properti.jenis = '$jenis_properti'";
			$properti = $this->db->query($query);

			if (empty($properti->num_rows())) {
				$this->session->set_flashdata('alertModal', 'Anda tidak memiliki sewa yang sedang berlangsung');
				redirect("produk/$jenis_properti", 'refresh');
			}

			$this->session->set_flashdata('informasiModal', $properti->row());
			redirect("produk/$jenis_properti", 'refresh');
		}
	}
}
