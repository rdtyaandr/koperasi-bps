<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
		$this->load->library('form_validation');
	}

	public function index()
	{
		//jika validasi nya gagal
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('auth/v_login', $data);
		} else {
			//jika validasinya success
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		// Ambil data pengguna berdasarkan username
		$user = $this->db->get_where('tb_admin', ['username' => $username])->row_array();

		// Jika pengguna ditemukan
		if ($user) {
			// Jika pengguna aktif
			if ($user['is_active'] == 1) {
				// Verifikasi password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id' => $user['id'],
						'nama_lengkap' => $user['nama_lengkap'],
						'username' => $user['username'],
						'email' => $user['email'],
						'satker' => $user['satker'],
						'profile_picture' => $user['profile_picture'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

					// Arahkan berdasarkan role_id
					if ($user['role_id'] == 1) {
						redirect('dashboard');
					} elseif ($user['role_id'] == 2) {
						redirect('dashboard');
					} elseif ($user['role_id'] == 3) {
						redirect('user/user');
					} else {
						// Default redirect jika role_id tidak dikenali
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong Password!
                </div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Your Account has not been activated
            </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Your user not found
        </div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('nama_lengkap','Fullname','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[tb_admin.email]');
		$this->form_validation->set_rules('satker','Satker','required|trim');
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'matches' => 'Password dont match!',
			'min_lenght' => 'Password Too Short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'Koperasi Registration';
			$this->load->view('auth/v_regist', $data);
		} else {
			$data = [
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
				'username' => htmlspecialchars($this->input->post('username',true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'satker' => htmlspecialchars($this->input->post('satker', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 3,
				'profile_picture' => 'material/image/user.jpg',
				'is_active' => 1
			];
			$this->db->insert('tb_admin', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Congratulation! your account is been created. please login!
		</div>');
			redirect('auth');
		}
	}



	public function logout()
	{
		// Hapus data sesi
		$this->session->sess_destroy();

		// Hapus semua userdata
		$this->session->unset_userdata(['id', 'username', 'role_id']);

		// Atur pesan dan arahkan ulang ke halaman login
		$this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    You have been logged out!
    </div>');
		redirect('auth');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);

		if (isset($post['login'])) {
			//ambil data dari tabel dengan model
			$this->load->model('m_user');

			$query = $this->m_user->login($post);

			//validasi
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'id' => $row->id,
					'nama_lengkap' => $row->nama_lengkap,
					'username' => $row->username,
				);

				//set session
				$this->session->set_userdata($params);
				$this->session->set_flashdata('login', 'berhasil');
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('login', 'gagal');
				redirect('auth');
			}
		}
	}

	public function update_account()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', 'Update account failed');
			redirect(base_url('dashboard/account_setting'));
		} else {
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('success', 'Update account successful');
			redirect(base_url('dashboard/account_setting'));
		}
	}
}
