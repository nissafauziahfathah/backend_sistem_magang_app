<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('laporan')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('laporan', array(
            'id_laporan' => $id
        ))->row();
    }

    public function insert($data)
    {
        return $this->db->insert('laporan', $data);
    }

    public function update($id, $data)
    {
        return $this->db->where('id_laporan', $id)
                        ->update('laporan', $data);
    }

    public function delete($id)
    {
        return $this->db->where('id_laporan', $id)
                        ->delete('laporan');
    }

}