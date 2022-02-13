<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{
    var $folder        = 'users/';
    public function __construct()
    {
        //load model paket,pelanggan,transaksi
        parent::__construct();
        $this->load->model('mod_paket', 'paket');
        $this->load->model('mod_pelanggan', 'pelanggan');
        $this->load->model('mod_transaksi', 'transaksi');
    }
//halaman awal saat masuk ke web alternate / laundry
    public function index()
    {
        $data = [
            'title' => 'Alternate',
            'paket' => $this->paket->getpaket(),
            'transaksi' => $this->transaksi->getTransaksi(),
            'content'     => $this->folder . ('view'),

        ];
        $this->load->view('layout/users/template', $data);
    }
    //halaman hasil pencarian no transaksi
    public function hasil()
    {
        $data = [
            'title' => 'Lacak Status',
            'paket' => $this->paket->getpaket(),
            'pelanggan' => $this->pelanggan->getpelanggan(),
            'cari' => $this->transaksi->cariStatus(),

        ];
        $this->load->view('users/lacak', $data);
    }

    //halaman load tampilan 404
    public function notfound()
    {
        $this->load->view('layout/error/notfound');
    }
    //halaman load tampilan 403
    public function noaccess()
    {
        $this->load->view('layout/error/noaccess');
    }
}

/* End of file Landing_page.php */
