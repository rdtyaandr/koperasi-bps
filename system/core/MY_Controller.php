<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    protected $data = [];
    protected $user_data = null;

    public function __construct() {
        parent::__construct();

        // Memuat model
        $this->load->model('M_account');

        // Mendapatkan ID pengguna dari session
        $user_id = $this->session->userdata('id');

        // Jika ada user_id, ambil data pengguna
        if ($user_id) {
            $this->user_data = $this->M_account->getUserDataById($user_id);
            
            if ($this->user_data) {
                $this->data['profile_picture'] = $this->user_data->profile_picture;
                $this->data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
                $this->data['username'] = $this->session->userdata('username');
            } else {
                // Tangani kasus ketika data pengguna tidak ditemukan
                $this->data['profile_picture'] = 'default_profile_picture.jpg';
                $this->data['nama_lengkap'] = '';
                $this->data['username'] = '';
            }
        } else {
            // Jika tidak ada user_id, set data default
            $this->data['profile_picture'] = 'default_profile_picture.jpg';
            $this->data['nama_lengkap'] = '';
            $this->data['username'] = '';
        }
    }
}
