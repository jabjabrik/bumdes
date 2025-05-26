<?php

require_once APPPATH . 'third_party/PhpWord/PhpWordAutoloader.php';
PhpWordAutoloader::register();


use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;

function authorize_user($roles = 'admin')
{
    $CI = &get_instance();
    $user_role = $CI->session->userdata('user_role');

    if (!$user_role) {
        redirect('auth');
    }

    if ($user_role === 'admin') {
        return true;
    }

    if (is_string($roles)) {
        $roles = [$roles];
    }

    // Periksa apakah user memiliki salah satu role yang diizinkan
    if (!in_array($user_role, $roles)) {
        redirect('dashboard');
    }

    return true;
}


function dd($data)
{
    var_dump($data);
    die();
}

function upload_file($file_upload)
{
    $CI = get_instance();
    $image_type = pathinfo($_FILES[$file_upload]['name'], PATHINFO_EXTENSION);

    $config['upload_path'] = "./file/";
    $config['file_name'] = time();
    $config['allowed_types'] = '*';


    $CI->upload->initialize($config);


    if (!$CI->upload->do_upload($file_upload)) {
        var_dump($CI->upload->display_errors());
        die();
    } else {
        return $CI->upload->data()['file_name'];
    }
}

function hitung_lama_sewa($tanggal_awal, $tanggal_akhir, $jenis)
{
    $tanggal_awal = new DateTime($tanggal_awal);
    $tanggal_akhir = new DateTime($tanggal_akhir);

    $interval = date_diff($tanggal_awal, $tanggal_akhir);

    $lama_sewa = "";

    if ($jenis == 'ruko') {
        $lama_sewa .= "$interval->y";
    } else {
        $month = $interval->d == 0 ? $interval->m : $interval->m + 1;
        $lama_sewa .=  ($interval->y * 12) + $month;
    }
    return $lama_sewa;
}

function hitung_sisa_waktu_sewa($tanggalMulai, $tanggalSelesai)
{
    // Konversi string tanggal ke objek DateTime
    $startDate = new DateTime($tanggalMulai);
    $endDate = new DateTime($tanggalSelesai);
    $currentDate = new DateTime(date('Y-m-d'));

    $interval = $endDate->diff($currentDate);

    $sisaTahun = $interval->y;
    $sisaBulan = $interval->m;
    $sisaHari = $interval->d;

    $output = "";
    if ($sisaTahun > 0) {
        $output .= $sisaTahun . " tahun ";
    }
    if ($sisaBulan > 0) {
        $output .= $sisaBulan . " bulan ";
    }
    if ($sisaHari > 0) {
        $output .= $sisaHari . " hari";
    }

    // Hapus spasi berlebih di akhir jika diperlukan
    return trim($output);
}

function hitung_jumlah_periode_lunas($data)
{
    $jumlah_periode_lunas = 0;
    foreach ($data as $item) {
        $jumlah_periode_lunas += (is_null($item->tanggal_pembayaran)) ? 0 : 1;
    }
    return $jumlah_periode_lunas;
}

function cek_status_lunas($pembayaran_sewa)
{
    foreach ($pembayaran_sewa as $item) {
        if ($item->status_pembayaran == 'pending') {
            return false;
        }
    }
    return true;
}

function generate_kwitansi($data)
{
    $templateFile = "file/template/kuitansi.docx";
    $templateProcessor = new TemplateProcessor($templateFile);
    $templateProcessor->setValues($data);
    $id = substr(bin2hex(random_bytes(7)), 0, 7);
    $output_file = "$id.docx";
    $templateProcessor->saveAs("file/$output_file");
    return $output_file;
}

function generate_perjanjian($data)
{
    $templateFile = "file/template/dokumen_perjanjian_sewa.docx";
    $templateProcessor = new TemplateProcessor($templateFile);
    $templateProcessor->setValues($data);
    $id = substr(bin2hex(random_bytes(7)), 0, 7);
    $output_file = "$id.docx";
    $templateProcessor->saveAs("file/$output_file");
    return $output_file;
}

function hitung_jatuh_tempo($tanggal_mulai,  $periode)
{
    $jatuh_tempo = new DateTime($tanggal_mulai);
    $jatuh_tempo->modify('+' . ($periode - 1) . ' month');
    return $jatuh_tempo->format('d-m-Y');
}
