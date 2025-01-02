<?php

// function is_logged_in()
// {
//     $CI = &get_instance();
//     if (!$CI->session->userdata('is_login')) {
//         redirect("/auth");
//     }
// }

function authorize_user($roles = 'admin')
{
    $CI = &get_instance();
    $user_role = $CI->session->userdata('user_role');

    if (empty('user_role')) {
        show_error('User tidak memiliki akses. Silakan login.', 403, 'Akses Ditolak');
    }

    if ($user_role === 'admin') {
        return true;
    }

    if (is_string($roles)) {
        $roles = [$roles];
    }

    // Periksa apakah user memiliki salah satu role yang diizinkan
    if (!in_array($user_role, $roles)) {
        show_error('Anda tidak memiliki akses untuk halaman ini.', 403, 'Akses Ditolak');
    }

    return true;
}


// function authorize($_role = 'admin')
// {
//     $CI = &get_instance();
//     $role = $CI->session->userdata('role');
//     if ($role !=  $_role  && !($role == 'admin')) redirect('dashboard');
// }

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

    $interval = $tanggal_awal->diff($tanggal_akhir);

    $lama_sewa = "";

    if ($jenis == 'ruko') {
        $lama_sewa .= "$interval->y";
    } else {
        $lama_sewa .=  ($interval->y * 12) + $interval->m;
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
