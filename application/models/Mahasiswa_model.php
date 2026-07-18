<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('mahasiswa')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('mahasiswa', [
            'id_mahasiswa' => $id
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id_mahasiswa', $id)
            ->update('mahasiswa', $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_mahasiswa', $id)
            ->delete('mahasiswa');
    }
}