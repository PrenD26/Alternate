<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    var $folder        = 'admin/';
    public function __construct()
    {
        parent::__construct();
       //load model transaksi,paket,pelanggan,user
        $this->load->model('mod_transaksi', 'transaksi');
        $this->load->model('mod_paket', 'paket');
        $this->load->model('mod_pelanggan', 'pelanggan');
        $this->load->model('mod_user', 'user');
         //pengecekan jika isi session (username) kosong maka dikembalikan ke login
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }

//halaman awal saat meload menu dashboard
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => $this->user->getuser(),
            'pelanggan' => $this->pelanggan->getPelanggan(),
            'jumlah_user' => $this->user->jumlah(),
            'jumlah_pelanggan' => $this->pelanggan->jumlah(),
            'jumlah_transaksi' => $this->transaksi->jumlah(),
            'hitung' => $this->transaksi->hitungTotal(),
            'transaksi' => $this->transaksi->getTransaksi(),
            'content'     => $this->folder . ('dashboard'),
        ];
        $this->load->view('layout/admin/template', $data);
    }
}

/* End of file Dashboard.php */
