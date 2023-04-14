<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function simpan()
    {
        $jarak = $this->input->get('jarak');

        $result = '';

        if ($jarak != '') {
            $data = [
                'jarak' => $jarak
            ];

            $insert = $this->db->insert('data', $data);

            if ($insert) {
                $result = 'Data berhasil disimpan';
            } else {
                $result = 'Server Error';
            }
        } else {
            $result = 'Jarak tidak boleh kosong';
        }

        echo $result;
    }
}

/* End of file Data.php */
