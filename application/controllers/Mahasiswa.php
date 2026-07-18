<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        if ($this->session->userdata('role') != 'admin') {
            show_error('Akses Ditolak!', 403);
        }

        $this->load->model('Mahasiswa_model');
    }

    public function index()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->getAll();
        print_r($data);
    }

    public function detail($id)
    {
        $data = $this->Mahasiswa_model->getById($id);
        print_r($data);
    }

    public function simpan()
    {
        $data = array(
            'nim'          => $this->input->post('nim'),
            'nama'         => $this->input->post('nama'),
            'universitas'  => $this->input->post('universitas'),
            'jurusan'      => $this->input->post('jurusan'),
            'email'        => $this->input->post('email'),
            'no_hp'        => $this->input->post('no_hp')
        );

        $this->Mahasiswa_model->insert($data);

        echo "Data berhasil disimpan";
    }

    public function update($id)
    {
        $data = array(
            'nim'          => $this->input->post('nim'),
            'nama'         => $this->input->post('nama'),
            'universitas'  => $this->input->post('universitas'),
            'jurusan'      => $this->input->post('jurusan'),
            'email'        => $this->input->post('email'),
            'no_hp'        => $this->input->post('no_hp')
        );

        $this->Mahasiswa_model->update($id, $data);

        echo "Data berhasil diupdate";
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->delete($id);

        echo "Data berhasil dihapus";
    }

}