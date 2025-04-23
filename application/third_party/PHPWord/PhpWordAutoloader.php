<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PhpWordAutoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            // Base directory untuk PHPWord
            $base_dir = APPPATH . 'third_party/PhpWord/';

            // Map namespace ke direktori
            $namespace_map = [
                'PhpOffice\\PhpWord\\' => 'src/PhpWord/',
                'PhpOffice\\Common\\' => 'src/Common/'
            ];

            foreach ($namespace_map as $prefix => $dir) {
                // Cek apakah class menggunakan namespace prefix
                $len = strlen($prefix);
                if (strncmp($prefix, $class, $len) !== 0) {
                    continue;
                }

                // Dapatkan relative class name
                $relative_class = substr($class, $len);

                // Ganti namespace separator dengan directory separator
                $file = $base_dir . $dir . str_replace('\\', '/', $relative_class) . '.php';

                // Jika file ada, require sekali
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        });
    }
}
