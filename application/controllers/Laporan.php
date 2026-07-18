<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('auth');
        }

        $this->load->model('Laporan_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $data['laporan'] = $this->Laporan_model->getAll();
        print_r($data);
    }

    public function simpan()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|doc|docx';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        if(!$this->upload->do_upload('file_laporan'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
            $file = $this->upload->data();

            $data = array(
                'id_tugas' => $this->input->post('id_tugas'),
                'judul_laporan' => $this->input->post('judul_laporan'),
                'file_laporan' => $file['file_name'],
                'tanggal_upload' => date('Y-m-d'),
                'keterangan' => $this->input->post('keterangan')
            );

            $this->Laporan_model->insert($data);

            echo "Laporan berhasil diupload";
        }
    }

    public function hapus($id)
    {
        $this->Laporan_model->delete($id);

        echo "Laporan berhasil dihapus";
    }

}