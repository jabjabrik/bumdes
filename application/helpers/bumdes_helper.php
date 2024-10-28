<?php

function is_logged_in()
{
    $CI = &get_instance();
    if (!$CI->session->userdata('is_login')) {
        redirect("/");
    }
}

function authorize($_role = 'admin')
{
    $CI = &get_instance();
    $role = $CI->session->userdata('role');
    if ($role !=  $_role  && !($role == 'admin')) redirect('dashboard');
}

function dd($data)
{
    var_dump($data);
    die();
}

function upload_file($file_upload, $file_name, $jenis_pemilihan)
{
    $CI = get_instance();
    $image_type = pathinfo($_FILES[$file_upload]['name'], PATHINFO_EXTENSION);

    $config['upload_path'] = "./files/$jenis_pemilihan";
    $config['file_name'] = "$file_name.$image_type";
    $config['allowed_types'] = 'jpg|jpeg|png';

    $CI->upload->initialize($config);
    if (!$CI->upload->do_upload($file_upload)) {
        var_dump($CI->upload->display_errors());
        die();
    } else {
        return $CI->upload->data()['file_name'];
    }
}

function set_alert($message, $color)
{
    $CI = get_instance();
    $params = array(
        'message' => $message,
        'color' => $color
    );
    $CI->session->set_flashdata('alert', $params);
}
