<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_account extends CI_Model {
    
    public function updateAccount($nama_lengkap, $username, $hashed_new_password = null) {
        // Contoh update jika password baru tidak kosong
        if ($hashed_new_password !== null) {
            // Lakukan update dengan password baru
            $data = array(
                'nama_lengkap' => $nama_lengkap,
                'username' => $username,
                'password' => $hashed_new_password
            );
        } else {
            // Lakukan update tanpa mengubah password
            $data = array(
                'nama_lengkap' => $nama_lengkap,
                'username' => $username
            );
        }

        // Misalnya, update berdasarkan id user yang sedang login
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('tb_admin', $data);
    }

    public function updateProfilePicture($user_id, $file_path) {
        // Ambil path gambar lama dari database
        $this->db->select('profile_picture');
        $this->db->where('id', $user_id);
        $query = $this->db->get('tb_admin');
    
        if ($query->num_rows() == 1) {
            $old_file_path = $query->row()->profile_picture;
    
            // Hapus gambar lama jika ada
            if ($old_file_path && file_exists($old_file_path)) {
                unlink($old_file_path);
            }
        }
    
        // Update dengan gambar baru
        $data = array('profile_picture' => $file_path);
        $this->db->where('id', $user_id);
        $this->db->update('tb_admin', $data);
    }
    

    public function getPasswordById($user_id) {
        $this->db->select('password');
        $this->db->where('id', $user_id);
        $query = $this->db->get('tb_admin');

        if ($query->num_rows() == 1) {
            return $query->row()->password;
        } else {
            return FALSE;
        }
    }

    public function getUserDataById($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('tb_admin');

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
}
