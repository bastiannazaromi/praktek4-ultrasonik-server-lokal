<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

    function cek($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('tb_admin');
        $data = $query->row();

        if ($data) {
            if (password_verify($password, $data->password)) {
                $login        =    array(
                    'is_logged_in'    => true,
                    'username'           => $username,
                    'id'              => $data->id,
                    'role'            => 'admin'
                );
                if ($login) {
                    $this->session->set_userdata('log_admin', $login);
                    $this->session->set_userdata($login);
                    return 'admin';
                }
            } else {
                return 'Username atau Password Salah!!';
            }
        }
    }
}

/* End of file M_login.php */
