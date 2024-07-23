<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	public function index()
	{
		$this->template->load('user_template', 'v_dashboard');
	}

	public function account_settings()
	{
		$this->load->view('account_settings', array(
			'username' => $this->session->userdata('username'),
			'email' => $this->session->userdata('email')
		)
		);
	}


}