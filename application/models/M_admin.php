<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{

    public function delete($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('tb_data');
    }

    // list admin
    public function getadmin()
    {
        return $this->db->get('tb_admin')->result();
    }
}

/* End of file M_admin.php */
