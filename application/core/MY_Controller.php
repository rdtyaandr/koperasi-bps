<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data = [];
    protected $user_data = null;

    public function __construct()
    {
        parent::__construct();
        $this->check_login();

        // Memuat model
        $this->load->model('M_account');

        // Mendapatkan ID pengguna dari session
        $user_id = $this->session->userdata('id');

        if ($user_id) {
            $this->user_data = $this->M_account->getUserDataById($user_id);
            
            if ($this->user_data) {
                $this->data['profile_picture'] = $this->user_data->profile_picture;
                $this->data['nama_lengkap'] = $this->session->userdata('nama_lengkap');
                $this->data['username'] = $this->session->userdata('username');
            } else {
                // Tangani kasus ketika data pengguna tidak ditemukan
                $this->data['profile_picture'] = 'material/image/user.jpg';
                $this->data['nama_lengkap'] = '';
                $this->data['username'] = '';
            }
        } else {
            // Jika tidak ada user_id, set data default
            $this->data['profile_picture'] = 'material/image/user.jpg';
            $this->data['nama_lengkap'] = '';
            $this->data['username'] = '';
        }
    }

    protected function check_login()
    {
        $controller = $this->router->fetch_class();
        $method = $this->router->fetch_method();
        
        // Jika pengguna belum login, arahkan ke halaman login
        if (!$this->session->userdata('id')) {
            if ($controller !== 'auth') {
                redirect('auth');
            }
        } else {
            // Jika pengguna sudah login, arahkan ke halaman sesuai role_id
            if ($controller === 'auth' && $method !== 'logout') {
                $role_id = $this->session->userdata('role_id');
                if ($role_id == 1) {
                    redirect('dashboard');
                } elseif ($role_id == 2) {
                    redirect('dashboard');
                }elseif ($role_id == 3) {
                    redirect('user/user');
                }
            }
        }
    }
}
