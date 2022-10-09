<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Landing_page extends CI_Controller
{
    var $folder        = 'home/';
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
            'paket' => $this->paket->getdata(),
            'transaksi' => $this->transaksi->getdata(),
            'content'     => $this->folder . ('view'),

        ];
        $this->load->view('layout/U_layout', $data);
    }
    //halaman hasil pencarian no transaksi
    public function hasil()
    {
        $data = [
            'title' => 'Lacak Status',
            'paket' => $this->paket->getdata(),
            'pelanggan' => $this->pelanggan->getdata(),
            'cari' => $this->transaksi->find(),
        ];
        $this->load->view('home/lacak', $data);
    }

    //halaman load tampilan 404
    public function notfound()
    {
        $this->load->view('errors/notfound');
    }
    //halaman load tampilan 403
    public function noaccess()
    {
        $this->load->view('errors/noaccess');
    }
}

/* End of file Landing_page.php */
