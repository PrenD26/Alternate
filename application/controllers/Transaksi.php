<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Transaksi extends CI_Controller
{
    var $folder        = 'transaksi/';
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_transaksi', 'transaksi');
        $this->load->model('mod_paket', 'paket');
        $this->load->model('mod_pelanggan', 'pelanggan');
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Data Transaksi',
            'transaksi' => $this->transaksi->getdata(),
            'content'     => $this->folder . ('view'),
        ];
        $this->load->view('layout/A_layout', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Transaksi',
            'paket' => $this->paket->getdata(),
            'pelanggan' => $this->pelanggan->getdata(),
            'content'     => $this->folder . ('create'),
        ];
        $this->load->view('layout/A_layout', $data);
    }
    public function input()
    {
        $this->_aturan();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $post =  $this->input->post();
            $data = [
                'no_transaksi' => $post['no_transaksi'],
                'id_pelanggan' => $post['id_pelanggan'],
                'id_user' => $this->session->userdata('id_user'),
                'id_paket' => $post['id_paket'],
                'qty' => $post['qty'],
                'harga' => $post['harga'],
                'bayar' => $post['bayar'],
                'total' => $post['total'],
                'status' => '1',
                'note' => $post['note'],
                'kembalian' => $post['kembalian'],
                'created' => time(),
            ];
            $this->transaksi->create($data);
            $this->session->set_flashdata('transaksi', 'Ditambahkan!');
            redirect('transaksi');
        }
    }
    public function update($id_transaksi)
    {
        $this->_dummy();
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => 'Update Transaksi',
                'paket' => $this->paket->getdata(),
                'pelanggan' => $this->pelanggan->getdata(),
                'transaksi' => $this->transaksi->v_id($id_transaksi),
                'content'     => $this->folder . ('update'),
            ];
            $this->load->view('layout/A_layout', $data);
        } else {
            $post =  $this->input->post();
            $data = array(
                'id_transaksi' => $id_transaksi,
                'status' => $post['status'],
                'note' => $post['note'],
                'updated' => time(),
            );
            $this->transaksi->update($data);
            $this->session->set_flashdata('transaksi', 'Diupdate!');
            redirect('transaksi');
        }
    }

    public function delete($id_transaksi)
    {
        $this->transaksi->delete($id_transaksi);
        $this->session->set_flashdata('transaksi', 'Dihapus!');
        redirect('transaksi');
    }
    public function _dummy()
    {
        $this->form_validation->set_rules('note', 'Catatan', 'trim');
    }
    public function _aturan()
    {
        $post =  $this->input->post();
        $this->form_validation->set_rules(array(
            array(
                'field' => 'qty',
                'label' => 'Qty',
                'rules' => 'required|trim|numeric|strip_tags',
                'errors' =>
                array(
                    'required'      => 'Data %s Wajib Diisi.',
                    'numeric' => 'Data %s Harus Berupa Angka'
                ),
            ),
            array(
                'field' => 'bayar',
                'label' => 'Bayar',
                'rules' => 'required|trim|numeric|min_length[4]|greater_than_equal_to[' . $post['total'] . ']|strip_tags',
                'errors' =>
                array(
                    'min_length' => 'Data %s Harus Berisikan Minimal 4 Huruf',
                    'numeric' => 'Data %s Harus Berupa Angka',
                    'required'      => 'Data %s Wajib Diisi.',

                ),
            ),
        ));
    }
    public function detail($id_transaksi)
    {
        $data = [
            'title' => 'Detail Transaksi',
            'transaksi' => $this->transaksi->v_id($id_transaksi),
            'content'     => $this->folder . ('detail'),
        ];
        $this->load->view('layout/A_layout', $data);
    }
    public function nota($id_transaksi)
    {
        $data = [
            'title' => 'Nota Transaksi',
            'paket' => $this->paket->getdata(),
            'pelanggan' => $this->pelanggan->getdata(),
            'transaksi' => $this->transaksi->v_id($id_transaksi),
        ];
        $this->load->view('transaksi/nota', $data);
    }
    public function cari()
    {
        $id_transaksi_paket = $_GET['id_paket'];
        $cari = $this->paket->cari($id_transaksi_paket)->result();
        echo json_encode($cari);
    }
    public function cari_pelanggan()
    {
        $id_transaksi_pelanggan = $_GET['id_pelanggan'];
        $find = $this->pelanggan->cari($id_transaksi_pelanggan)->result();
        echo json_encode($find);
    }
 
}

/* End of file paket.php */
