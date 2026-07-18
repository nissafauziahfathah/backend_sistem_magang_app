<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    // Menghitung jumlah mahasiswa
    public function jumlahMahasiswa()
    {
        return $this->db->count_all('mahasiswa');
    }

    // Menghitung jumlah tugas
    public function jumlahTugas()
    {
        return $this->db->count_all('tugas');
    }

    // Menghitung jumlah laporan
    public function jumlahLaporan()
    {
        return $this->db->count_all('laporan');
    }

    // Menghitung jumlah tugas berdasarkan mahasiswa
    public function jumlahTugasMahasiswa($id_mahasiswa)
    {
        return $this->db
                    ->where('id_mahasiswa', $id_mahasiswa)
                    ->count_all_results('tugas');
    }

}