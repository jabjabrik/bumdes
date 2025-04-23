<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load PHPWord manual tanpa Composer
require_once APPPATH . 'third_party/PhpWord/PhpWordAutoloader.php';
PhpWordAutoloader::register();


use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

class Word extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $templateFile = "file/template/kuitansi.docx";
        $templateProcessor = new TemplateProcessor($templateFile);
        $data = [
            'nama_penyewa' => 'Fitri Handayani',
            'nominal_pembayaran' => 'Rp 200.000',
            'deskripsi' => 'Penerimaan dari hasil sewa ruko (ruko 1) dengan periode cicilan bulan ke-2 mulai dari 2025-01-15 selama 1 tahun oleh Fitri Handayani',
            'metode_pembayaran' => 'kontan',
            'pembayaran_via' => 'transfer',
            'tanggal' => '2025/04/20',
        ];
        $templateProcessor->setValues($data);
        $output_file = "kuitansi-1.docx";
        $templateProcessor->saveAs("file/$output_file");
    }
}
