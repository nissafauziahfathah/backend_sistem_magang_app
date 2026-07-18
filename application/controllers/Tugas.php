<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        if ($this->session->userdata('role') != 'admin') {
            show_error('Akses Ditolak!', 403);
        }

        $this->load->model('Tugas_model');
    }

    public function index()
    {
        $data['tugas'] = $this->Tugas_model->getAll();
        print_r($data);
    }

    public function detail($id)
    {
        print_r($this->Tugas_model->getById($id));
    }

    public function simpan()
    {
        $data = array(
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'judul_tugas'  => $this->input->post('judul_tugas'),
            'deskripsi'    => $this->input->post('deskripsi'),
            'deadline'     => $this->input->post('deadline'),
            'status'       => $this->input->post('status')
        );

        $this->Tugas_model->insert($data);

        echo "Data tugas berhasil disimpan";
    }

    public function update($id)
    {
        $data = array(
            'id_mahasiswa' => $this->input->post('id_mahasiswa'),
            'judul_tugas'  => $this->input->post('judul_tugas'),
            'deskripsi'    => $this->input->post('deskripsi'),
            'deadline'     => $this->input->post('deadline'),
            'status'       => $this->input->post('status')
        );

        $this->Tugas_model->update($id, $data);

        echo "Data tugas berhasil diupdate";
    }

    public function hapus($id)
    {
        $this->Tugas_model->delete($id);

        echo "Data tugas berhasil dihapus";
    }
}