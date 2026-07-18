<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login')) {
            redirect('auth');
        }

        $this->load->model('Dashboard_model');
    }

    public function admin()
    {
        if ($this->session->userdata('role') != 'admin') {
            show_error('Akses Ditolak!', 403);
        }

        $data = array(
            'jumlah_mahasiswa' => $this->Dashboard_model->jumlahMahasiswa(),
            'jumlah_tugas'     => $this->Dashboard_model->jumlahTugas(),
            'jumlah_laporan'   => $this->Dashboard_model->jumlahLaporan()
        );

        print_r($data);
    }

    public function mahasiswa()
    {
        if ($this->session->userdata('role') != 'mahasiswa') {
            show_error('Akses Ditolak!', 403);
        }

        $id_mahasiswa = $this->session->userdata('id_mahasiswa');

        $data = array(
            'username'      => $this->session->userdata('username'),
            'jumlah_tugas'  => $this->Dashboard_model->jumlahTugasMahasiswa($id_mahasiswa)
        );

        print_r($data);
    }

}