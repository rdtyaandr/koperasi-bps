<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_account');
        $this->load->library('form_validation');
        not_login();
    }

    public function index() {
        not_login();
        $user_id = $this->session->userdata('id');
		$user_data = $this->M_account->getUserDataById($user_id);
		
		$this->template->load('template', 'v_dashboard', array(
			'nama_lengkap' => $this->session->userdata('nama_lengkap'),
			'username' => $this->session->userdata('username'),
			'profile_picture' => $user_data->profile_picture
		));
    }

	public function account_setting() {
		$user_id = $this->session->userdata('id');
		$user_data = $this->M_account->getUserDataById($user_id);
		
		$this->template->load('template', 'v_akun', array(
			'nama_lengkap' => $this->session->userdata('nama_lengkap'),
			'username' => $this->session->userdata('username'),
			'profile_picture' => $user_data->profile_picture
		));
	}	

	public function update_account() {
		// Ambil nilai dari form
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$new_password = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');
	
		// Ambil nilai dari session
		$current_nama_lengkap = $this->session->userdata('nama_lengkap');
		$current_username = $this->session->userdata('username');
	
		// Periksa apakah ada perubahan
		if ($nama_lengkap == $current_nama_lengkap && $username == $current_username && empty($password) && empty($new_password) && empty($confirm_password)) {
			$this->session->set_flashdata('no_change', 'Tidak ada perubahan');
			redirect('dashboard/account_setting');
			return;
		}
	
		// Set aturan validasi untuk username
		$this->form_validation->set_rules('username', 'username', 'trim|required|callback_check_valid_username');
		
		// Validasi password lama dengan password yang ada di database
		if (!empty($password)) {
			$this->form_validation->set_rules('password', 'password lama', 'trim|required|callback_check_old_password');
		}
	
		// Set aturan validasi untuk password baru
		if (!empty($new_password)) {
			$this->form_validation->set_rules('new_password', 'password baru', 'trim|required|callback_check_password_complexity|matches[confirm_password]');
			$this->form_validation->set_rules('confirm_password', 'konfirmasi password baru', 'trim|required|callback_check_password_complexity|matches[new_password]');
		}
	
		// Jalankan validasi form
		if ($this->form_validation->run() == FALSE) {
			// Validasi gagal, tampilkan kembali form dengan error
			$this->account_setting(); // Misalnya, kembali ke halaman pengaturan akun
		} else {
			// Panggil model untuk melakukan validasi atau update data ke database
			$this->M_account->updateAccount($nama_lengkap, $username, $password, $new_password, $confirm_password);
	
			// Set ulang session setelah update
			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('nama_lengkap', $nama_lengkap);
	
			// Set flashdata untuk pesan sukses
			$this->session->set_flashdata('success', 'Berhasil Diupdate');
	
			// Redirect kembali ke halaman detail akun
			redirect('dashboard/account_setting');
		}
	}
	

	public function upload_profile_picture() {
        // Load library upload
        $this->load->library('upload');

        // Konfigurasi upload
        $config['upload_path'] = './uploads/profile_pictures/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; // Maksimal ukuran file dalam KB
        $config['encrypt_name'] = TRUE; // Enkripsi nama file agar unik

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file-upload')) {
            // Jika gagal upload
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
        } else {
            // Jika berhasil upload
            $file_data = $this->upload->data();
            $file_path = 'uploads/profile_pictures/' . $file_data['file_name'];

            // Update path gambar di database
            $this->M_account->updateProfilePicture($this->session->userdata('id'), $file_path);
            $this->session->set_flashdata('success', 'Foto profil berhasil diupdate');
        }

        redirect('dashboard/account_setting');
    }


















	
    // Callback 
    public function check_valid_username($str) {
        // Pemeriksaan menggunakan regular expression
        if (preg_match('/^\s*$/', $str)) {
            $this->form_validation->set_message('check_valid_username', 'Username tidak boleh kosong atau hanya terdiri dari spasi kosong');
            return FALSE;
        } else {
            return TRUE;
        }
    }
	public function check_password_complexity($str) {
		// Validasi panjang password minimal 4 karakter
		if (strlen($str) < 4) {
			$this->form_validation->set_message('check_password_complexity', 'Password minimal terdiri dari 4 karakter');
			return FALSE;
		}
		return TRUE;
	}
	public function check_old_password($str) {
		$user_id = $this->session->userdata('id'); // Ambil ID user dari session atau dari data lain yang sesuai
		$stored_password = $this->M_account->getPasswordById($user_id); // Gantikan dengan method yang sesuai untuk mengambil password dari database
	
		// Trim spasi dari kedua password
		$stored_password = trim($stored_password);
		$input_password = trim($str);
	
		// Bandingkan password dengan ===
		if ($stored_password !== $input_password) {
			$this->form_validation->set_message('check_old_password', 'Password lama tidak sesuai');
			return FALSE;
		}
		return TRUE;
	}
	
	
}