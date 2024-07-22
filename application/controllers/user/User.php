<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User extends CI_Controller{
    public function index ()
    {
        $data['user'] = $this->db->get_where('tb_admin',['username' => $this->session->userdata('username')])->row_array();
        $this->template->load('user_template', 'user/userhome',$data) ;
    }
}
?>