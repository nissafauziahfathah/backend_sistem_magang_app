<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Auth_model->cek_login($username,$password);

 if($user){

    $this->session->set_userdata(array(
        'id_user' => $user->id_user,
        'username' => $user->username,
        'role' => $user->role,
        'id_mahasiswa' => $user->id_mahasiswa,
        'login' => TRUE
    ));

    if($user->role == 'admin'){
        redirect('dashboard/admin');
    }else{
        redirect('dashboard/mahasiswa');
    }

    }else{

        echo "Username atau Password Salah";

    }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

}