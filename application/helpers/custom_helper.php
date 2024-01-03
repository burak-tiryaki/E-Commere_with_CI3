<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_project_path')) {
    function get_project_path() {
        // __FILE__ kullanarak bulunduğumuz dosyanın tam yolunu alıyoruz
        $filePath = __FILE__;

        // CodeIgniter uygulamasının index.php dosyasının konumunu içeren bir dizge
        $indexFile = 'index.php';

        // Tam yol içerisinden index.php dosyasının konumunu çıkartıyoruz
        $projectPath = str_replace($indexFile, '', $filePath);

        $projectPath = str_replace('/application/helpers/custom_helper.php', '', $projectPath);

        return $projectPath;
    }
}
