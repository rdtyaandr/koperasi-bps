<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('check_admin')) {
    function check_admin() {
        $CI =& get_instance();
        $user_role = $CI->session->userdata('role'); // Asumsikan role disimpan di session
        if ($user_role !== 'admin') {
            show_404();
            exit();
        }
    }
}
