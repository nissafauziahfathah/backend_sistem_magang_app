<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('tugas')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('tugas', [
            'id_tugas' => $id
        ])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('tugas', $data);
    }

    public function update($id, $data)
    {
        return $this->db
            ->where('id_tugas', $id)
            ->update('tugas', $data);
    }

    public function delete($id)
    {
        return $this->db
            ->where('id_tugas', $id)
            ->delete('tugas');
    }

}