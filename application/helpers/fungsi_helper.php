<?php

function already_login(){
    // Mendapatkan instance dari CodeIgniter
    $ci =& get_instance();
    // Mendapatkan data sesi pengguna dengan kunci 'username'
    $user_session = $ci->session->userdata('username');
    // Jika sesi pengguna ada, arahkan ke halaman dashboard
    if($user_session)
    {
        redirect('dashboard');
    }
}

function not_login(){
    // Mendapatkan instance dari CodeIgniter
    $ci =& get_instance();
    // Mendapatkan data sesi pengguna dengan kunci 'username'
    $user_session = $ci->session->userdata('username');
    // Jika sesi pengguna tidak ada, arahkan ke halaman auth
    if(!$user_session)
    {
        redirect('auth');
    }
}