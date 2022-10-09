<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{



    public function __construct()
    {
        //load model login,user
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('login_model', 'login');
        $this->load->model('Mod_user', 'users');
    }
    //halaman awal saat meload menu login
    public function index()
    {
        //pengecekan jika isi session (username) ada maka langsung dikembalikan ke dashboard
        if ($this->session->userdata('username')) redirect('dashboard');
        $this->load->view('extra/login3');
    }
    function proses_login()
    {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        // select * from user where username = ?
        $user = $this->login->getuser($username);

        //jika user ada
        if ($user) {

            //jika user aktif
            if ($user['status'] == 'Active') {
                //jika password benar
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'level' => $user['level'],
                        'image' => $user['image'],
                        'status' => $user['status'],
                        'jam_login' => time(),
                    ];
                    // membuat session
                    $this->session->set_userdata($data);
                    //input ke db tabel user untuk membuat tampilan last login pada admin page
                    date_default_timezone_set("ASIA/JAKARTA");
                    $login = array(
                        'id_user' => $this->session->userdata('id_user'),
                        'last_login' => time(),
                        'kondisi' => '1',
                    );
                    $this->users->login($login);
                    $this->session->set_flashdata('dashboard', 'Hallo');
                    redirect('dashboard');
                    //jika password salah
                } else {
                    $this->session->set_flashdata('flash', 'Password yang anda masukkan salah!');
                    redirect('login');
                }
                //jika user inactive
            } else {
                $this->session->set_flashdata('flash', 'Akun anda belum aktif!');
                redirect('login');
            }
        } else {
            // jika username salah
            $this->session->set_flashdata('flash', 'Username yang anda masukkan tidak terdaftar!');
            redirect('login');
        }
    }
    public function logout()
    {
        //input ke db tabel user untuk membuat tampilan last login pada admin page
        date_default_timezone_set("ASIA/JAKARTA");
        $logout = array(
            'id_user' => $this->session->userdata('id_user'),
            'last_login' => time(),
            'kondisi' => '2',
        );
        $this->users->logout($logout);
        //menghapus session
        $this->session->sess_destroy();
        redirect('login');
    }
}

/* End of file Login.php */
