<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;

class Barang extends CI_Controller
{
    var $folder        = 'barang/';

    public function __construct()
    {
        parent::__construct();
        //load model barang
        $this->load->model('mod_barang', 'barang');
        //pengecekan jika isi session (username) kosong maka dikembalikan ke login
        if (
            $this->session->userdata('username') == null
        ) {
            redirect('login');
        }
    }

    //halaman saat meload menu barang
    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' => $this->barang->getdata(),
            'content'     => $this->folder . ('view'),

        ];
        $this->load->view('layout/A_layout', $data);
    }

    //menambahkan data baru ke db
    public function create()
    {
        $data = array(
            'jenis_barang' => $this->input->post('jenis_barang', true),
        );
        $this->barang->create($data);
        $this->session->set_flashdata('barang', 'Ditambahkan!');
        redirect('barang');
    }
    //mengubah data dari db
    public function update($id_barang)
    {
        $data = array(
            'id_barang' => $id_barang,
            'jenis_barang' => $this->input->post('jenis_barang', true),
        );
        $this->barang->update($data);
        $this->session->set_flashdata('barang', 'Diupdate!');
        redirect('barang');
    }
    //menghapus data dari db
    public function delete($id_barang)
    {
        $this->barang->delete($id_barang);
        $this->session->set_flashdata('barang', 'Dihapus!');
        redirect('barang');
    }
    //fungasi export excell
 
}

/* End of file barang.php */
