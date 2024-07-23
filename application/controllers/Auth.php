<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth extends CI_Controller{

	public function __construct()
{
	parent::__construct();
	$this->load->library('form_validation');

}

	public function index(){
		already_login();
		//jika validasi nya gagal
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		if($this->form_validation->run() == false)
		{
			$data['title'] = 'Login Page';
			$this->load->view('auth/v_login', $data);
		}else{
			//jika validasinya success
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$user = $this->db->get_where('tb_admin',['username' => $username])->row_array();
		
		//jika usernya ada
		if($user) {
			//jika usernya aktif
			if($user['is_active'] ==1 ) {
				//cek password
				if(password_verify($password,$user['password'])) {
					$data = [
						'id' => $user['id'],
						'nama_lengkap' => $user['nama_lengkap'],
						'username' => $user['username'],
						'role_id' => $user['role_id'],
						'profile_picture' => $user['profile_picture']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('dashboard');
					} else {
						redirect('user/user');
					}

				}else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Wrong Password!
			  </div>');
				redirect('auth');
			}
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Your Account has not been activated
			  </div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			Your user not found
		  </div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('nama_lengkap','Fullname','required|trim');
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'matches' => 'Password dont match!',
			'min_lenght' => 'Password Too Short!'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');


		if($this->form_validation->run() == false) {
			$data ['title'] ='Koperasi Registration';
			$this->load->view('auth/v_regist', $data);
		}else{
			$data = [
				'username' => htmlspecialchars($this->input->post('username')),
				'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap')),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'profile_picture' => 'uploads/profile_pictures/user.jpg',
				'is_active' => 1
			];
			$this->db->insert('tb_admin',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Congratulation! your account is been created. please login!
		  </div>');
			redirect('auth');
		}
	}



		public function logout()
	{
		$params = ['id','username','role_id'];
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('message','<div class="alert alert-primary" role="alert">
		You has been Logout!
	  </div>');
		redirect('auth');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);

		if(isset($post['login'])){
			//ambil data dari tabel dengan model
			$this->load->model('m_user');

			$query = $this->m_user->login($post);

			//validasi
			if($query->num_rows() > 0)
			{
				$row = $query->row();
				$params = array(
					'id'=> $row->id,
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

	public function update_account() {
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
